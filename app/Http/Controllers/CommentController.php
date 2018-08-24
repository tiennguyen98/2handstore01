<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Events\CommentEvent;
use App\Repositories\NotifyRepository;

class CommentController extends Controller
{

    private $notify;

    public function __construct(NotifyRepository $notifyRepository)
    {
        $this->notify = $notifyRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $comments = Comment::allComments($request->search);
        $page = $comments->currentPage();

        if ($request->ajax()) {
            return view('admin.comments.content', compact('comments', 'page'));
        }

        return view('admin.comments.index', compact('comments', 'page'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $this->validate($request, [
            'content' => 'required|string|max:191'
        ]);
        Comment::saveComment($request);
        $product = Product::findOrFail($id);
        $comments = Comment::parentComments($product->id);
        // Notification
        $user_id = $product->user->id;
        if ($user_id != $request->user()->id) {
            event(new CommentEvent(
                    $user_id, 
                    __('notify.comment', ['name' => $request->user()->name]), 
                    route('client.products.show', ['id' => $product->id])
                )
            );
            $notify = [
                'content' => __('notify.comment.insert'),
                'detail' => $request->user()->name,
                'user_id' => $user_id,
                'link' => route('client.products.show', ['id' => $product->id])
            ];
            $this->notify->create($notify);
        }

        return view('client.product.comment', compact('product', 'comments'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::transaction(function () use ($id) {
            Comment::destroy($id);
            Comment::deleteSubComment($id);
        });

        return redirect()->route('admin.comments.index');
    }

    public function clientDestroy(Request $request, $id)
    {
        DB::transaction(function () use ($id) {
            Comment::destroy($id);
            Comment::deleteSubComment($id);
        });

        $product = Product::findOrFail($request->id);
        $comments = Comment::parentComments($product->id);

        return view('client.product.comment', compact('product', 'comments'));
    }
}

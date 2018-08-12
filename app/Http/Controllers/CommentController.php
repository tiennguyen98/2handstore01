<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = Comment::allComments();
        $page = $comments->currentPage();

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
        Comment::destroy($id);
        $comments = Comment::allComments();
        $page = $comments->currentPage();

        return view('admin.comments.content', compact('comments', 'page'));
    }

    public function clientDestroy(Request $request, $id)
    {
        Comment::destroy($id);
        $product = Product::findOrFail($request->id);
        $comments = Comment::parentComments($product->id);

        return view('client.product.comment', compact('product', 'comments'));
    }
}

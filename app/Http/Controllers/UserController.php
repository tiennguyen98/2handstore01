<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::customer()->orderBy('updated_at')->paginate(config('database.paginate'));
        $page = $users->currentPage();
        
        return view('admin.users.index', compact(['users', 'page']));
    }

    public function option(Request $request)
    {
        $users = User::customer()->option($request->option)->orderBy('updated_at')->paginate(config('database.paginate'));
        $page = $users->currentPage();

        return view('admin.users.userTable', compact(['users', 'page']));
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $user = User::findOrFail($request->id);

        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('admin.users.edit', compact('user'));
    }

    public function getFilePath(Request $request, $name)
    {
        $file = $request->file($name);
        $fileName = $file->getClientOriginalName();
        $filePath = config('filesystems.img_path');
        if(file_exists($file))
        {
            $fileName = md5(str_random(15)) . $fileName;
        }
        $path = $file->storeAs($filePath, $fileName);

        return $path;
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
        $this->validate($request, [
            'image.*' => 'mimes:jpeg,jpg,png,bmp,svg|max:5120',
            'name' => 'string|min:5|max:255',
            'description' => 'string|nullable'
        ]);
        
        if($request->has('image')) {
            $request->merge([
                'avatar' => $this->getFilePath($request, 'image')
            ]);
        }

        try {
            $user = User::findOrFail($id);
            $user->saveUser($request->all());
        } catch(Exception $e) {
            return $e;
        }

        return redirect()->route('admin.users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function toggleBlock(Request $request) {
        $user = User::findOrFail($request->id);
        $user->status >= 0 ? $user->status = -1 : $user->status = 0;
        $user->save();
        
        return redirect()->route('admin.users.option', ['option' => $request->option]);
    }
}

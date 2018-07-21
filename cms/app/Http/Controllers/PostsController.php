<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Http\Requests;
use App\Http\Requests\CreatePostRequest;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();

        // latest post
        // $posts = Post::latest()->get();
        // order
        // $posts = Post::orderBy('id', 'asc')->get();

        // simple way - use scope
        $posts = Post::latest();

        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostRequest $request)
    {

        // upload file
        $input = $request->all();
        
        if($file = $request->file('file')){
            $name = $file->getClientOriginalName();

            $file->move('images', $name);
            $input['path'] = $name;
        }

        Post::create($input);
        return redirect('/posts');

        // file
        // $file = $request->file('file');
        // echo $file->getClientOriginalName();
        // echo $file->getClientSize();

        // validation
        // $this->validate($request, [
        //     'title'=>'required|max:10'
        //     // 'content'=>'required'
        // ]);

        // return $request->get('title');
        // return $request->title;

        // save
        // Post::create($request->all());
        // return redirect('/posts');

        // OR
        // $input = $request->all();
        // $input['title'] = $request->title;

        // Post::create($request->all());

        // OR
        // $post = new POST;
        // $post->title = $request->title;
        // $post->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);

        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.edit', compact('post'));
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
        $post = Post::findOrFail($id);
        $post->update($request->all());

        return redirect('/posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $post = Post::findOrFail($id);
        // $post->delete();
        $post = Post::whereId($id)->delete();
        return redirect('/posts');
    }
}

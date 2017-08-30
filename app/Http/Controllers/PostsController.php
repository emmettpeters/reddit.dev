<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Post;
use Log;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::paginate(4);
        $data['posts']= $posts;
        return view('posts.index',$data);

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
    public function store(Request $request)
    {
        $this->validate($request, Post::$rules);

        $title = $request->input('title');
        $content = $request->input('content');
        $url = $request->input('url');
        $post = new Post();
        $post->title = $title;
        $post->content = $content;
        $post->url = $url;
        $post->user_id = Auth::id();
        $post->save();

        $request->session()->flash('successMessage', 'Post created');

        Log::info("$title, $content, $url");

        return redirect()->action('PostsController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);

        if(!$post){
            abort(404);
        }

        $data['post'] = $post;
        return view('posts.show',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);

        if(!$post){
            abort(404);
        }

        $data['post'] = $post;
        return view('posts.edit',$data);
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
        $this->validate($request, Post::$rules);

        $post = Post::find($id);

        if(!$post){
            abort(404);
        }

        $post->title = $request->title;
        $post->content =$request->content;
        $post->url =$request->url;
        $post->user_id = 1;
        $post->save();

        $request->session()->flash('successMessage', 'Post updated');

        return \Redirect::action('PostsController@show', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $post = Post::find($id);

        if(!$post){
            abort(404);
        }

        $post->delete();
        $request->session()->flash('successMessage', 'Post deleted');
        return redirect()->action('PostsController@index');
    }
}

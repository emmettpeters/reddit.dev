<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Vote;
use Log;
use App\User;
use DB;

class PostsController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth',['except' => ['index','show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('q')){
            $q = $request->q;
            $posts = POST::search($q);    
        } else {
            $posts = Post::with('user')->paginate(6);  
        }


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
        $post->user_id = \Auth::id();
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

    public function usersposts($id)
    {   
        if(User::find($id) ===null)
        {
            abort(404);
        };

        $posts = User::find($id)->posts;

        $data['posts'] = $posts;
        return view('posts.usersposts',$data);
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

        if(\Auth::id() == $post->user_id){ 
            if(!$post){
                abort(404);
            }
            $data['post'] = $post;
            return view('posts.edit',$data);
        } else {
            header('Location:/posts');
        }
    }

    public function upvote($id)
    {
        $post = Post::find($id);
        $user_id = \Auth::id();
        $post_id = Post::find($id)->id;
        $voteCount = Vote::select('vote')->where('post_id',$post_id)->get()->count();




        dd(DB::table('votes')->select('vote')->where('post_id',$post_id)->sum('vote'));


        $currVotes = Vote::where('post_id',$id)->where('user_id',$user_id)->get();
        // if($currVotes->isEmpty()){
            $vote = new Vote;
            $vote->user_id = $user_id;
            $vote->post_id = $post_id;
            $vote->vote = 1;
            $vote->save();
        // };

        $data['post'] = $post;
        return view('posts.show',$data);
    }

    public function downvote($id)
    {
        $post = Post::find($id);
        $user_id = \Auth::id();
        $post_id = Post::find($id)->id;
        $currVotes = Vote::where('post_id',$id)->where('user_id',$user_id)->get();
        // if($currVotes->isEmpty()){
            $vote = new Vote;
            $vote->user_id = $user_id;
            $vote->post_id = $post_id;
            $vote->vote = -1;
            $vote->save();
        // };


        $data['post'] = $post;
        return view('posts.show',$data);
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

@extends('layouts.master')

@section('title')

	<title>Single Post</title>

@stop

@section('content')

	<main class="container" style="margin-top: 3em;">
        <h1><ul>Single Post</ul></h1>

        @if(Auth::id()==$post->user_id)
            <a href="{{action('PostsController@edit',$post->id)}}"><span class="glyphicon glyphicon-pencil"> : EDIT</span></a>
        @endif

        @if($_POST !== null)
            <h1>Title : {{ $post['title'] }}</h1>
            <p>ID : {{ $post['id'] }}</p>
            <p>{{ $post['content'] }}</p>
            <p>{{ $post['url'] }}</p>
            <p>{{ $post->user->name }}</p>
            <a href="{{action('PostsController@upvote',$post->id)}}"><span class="glyphicon glyphicon-thumbs-up"></span></a>
            <a href="{{action('PostsController@downvote',$post->id)}}"><span class="glyphicon glyphicon-thumbs-down"></span></a>
        @endif

    </main>

@stop

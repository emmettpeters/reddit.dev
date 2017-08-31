@extends('layouts.master')

@section('title')

<title>All Posts</title>

@stop

@section('content')

	<main class="container" style="margin-top: 3em;">
        @if (session()->has('successMessage'))
            <div class="alert alert-success">{{ session('successMessage') }}</div>
        @elseif (session()->has('errorMessage'))
            <div class="alert alert-error">{{ session('errorMessage') }}</div>
        @endif

        <h1>All Posts</h1>
        
        {!! $posts->appends(Request::except('page'))->render() !!}
    
        <div style="width:100%;">
        @foreach($posts as $post)
            <div style="width:50%;margin:0;float:left;padding:2em;">
                <h1><a href="{{ action('PostsController@show', $post->id)}}">{{$post->title}}</a><br>
                <a href="{{action('PostsController@upvote',$post->id)}}"><span class="glyphicon glyphicon-thumbs-up"></span></a>
                <a href="{{action('PostsController@downvote',$post->id)}}"><span class="glyphicon glyphicon-thumbs-down"></span></a></h1>
                <p>{{$post->content}}</p>
                <p>{{$post->url}}</p>
                <p>{{$post->created_at }}</p>
                <p>{{$post->user->name }}</p>
            </div>

        @endforeach
        </div>
    </main>

@stop

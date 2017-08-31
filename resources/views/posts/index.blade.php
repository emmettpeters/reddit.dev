@extends('layouts.master')

@section('title')

<title>All Posts</title>

@stop

@section('content')

	<main class="container">
        @if (session()->has('successMessage'))
            <div class="alert alert-success">{{ session('successMessage') }}</div>
        @elseif (session()->has('errorMessage'))
            <div class="alert alert-error">{{ session('errorMessage') }}</div>
        @endif

        <h1>All Posts</h1>
        @if(empty($_GET))
            {!! $posts->render() !!}
        @endif
        
        @foreach($posts as $post)
        
            <h1>{{$post->title}}<br>
            <a href="{{action('PostsController@upvote',$post->id)}}"><span class="glyphicon glyphicon-thumbs-up"></span></a>
            <a href="{{action('PostsController@downvote',$post->id)}}"><span class="glyphicon glyphicon-thumbs-down"></span></a></h1>
            <p>{{$post->content}}</p>
            <p>{{$post->url}}</p>
            <p>{{$post->created_at }}</p>
            <p>{{$post->user->name }}</p>
            <a href="{{ action('PostsController@show', $post->id)}}">See More</a>

        @endforeach
    </main>

@stop

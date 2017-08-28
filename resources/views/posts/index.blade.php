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
        
        {!! $posts->render() !!}
        
        @foreach($posts as $post)
        
            <h1>{{$post->title}}</h1>
            <p>{{$post->content}}</p>
            <p>{{$post->url}}</p>
            <p>{{$post->created_at->diffForHumans() }}</p>
            <a href="{{ action('PostsController@show', $post->id)}}">Link</a>

        @endforeach
    </main>

@stop

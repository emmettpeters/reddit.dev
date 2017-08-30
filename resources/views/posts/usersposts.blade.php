@extends('layouts.master')

@section('title')

<title>Users Posts</title>

@stop

@section('content')

	<main class="container">

        <h1>All User's Posts</h1>
        
        {{-- {!! $posts->render() !!} --}}
        
        @foreach($posts as $post)
        
            <h1>{{$post->title}}</h1>
            <p>{{$post->content}}</p>
            <p>{{$post->url}}</p>
            <p>{{$post->created_at }}</p>
            <a href="{{ action('PostsController@show', $post->id)}}">Link</a>

        @endforeach
    </main>

@stop

@extends('layouts.master')

@section('title')

<title>Edit Post</title>

@stop

@section('content')

	<main class="container">
        <h1>Edit a post here</h1>
        <form method="POST" action="{{ action('PostsController@update', $post->id )}}">
        {!! csrf_field() !!}
        {{ method_field('PUT') }}
            <input type="text" name="title" id="title" value="{{ $post->title }}" placeholder="title">
            <input type="text" name="content" id="content" value="{{ $post->content }}" placeholder="content">
            <input type="text" name="url" id="url" value="{{ $post->url }}" placeholder="url">
            <button>Submit</button>
        </form>

        <form method="POST" action="{{ action('PostsController@destroy', $post->id)}}">
        {!! csrf_field() !!}
        {{ method_field('DELETE') }}
        <button class="btn btn-warning">DELETE</button>
        </form>

    </main>

@stop

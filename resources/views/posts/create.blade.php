@extends('layouts.master')

@section('title')

<title>Create Post</title>

@stop

@section('content')

 	<main class="container">
        <h1>Create a post here</h1>
        <form method="POST" action="{{ action('PostsController@store') }}">
            {!! csrf_field() !!}
            <input type="text" name="title" id="title" value="{{ old('title') }}" placeholder="title">
            <input type="text" name="content" id="content" value="{{ old('content') }}" placeholder="content">
            <input type="text" name="url" id="url" value="{{ old('url') }}" placeholder="url">
            <button>Submit</button>
        </form>
    </main>

@stop
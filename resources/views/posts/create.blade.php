@extends('layouts.master')

@section('title')

<title>Create Post</title>

@stop

@section('content')

 	<main class="container">
        <h1>Create a post here</h1>
        <form method="POST" action="{{ action('PostsController@store') }}">
            {!! csrf_field() !!}
            {!! $errors->first('title','<span class="help-block">:message</span>') !!}
            <input type="text" name="title" id="title" value="{{ old('title') }}" placeholder="title"><br>
            {!! $errors->first('content','<span class="help-block">:message</span>') !!}
            <input type="text" name="content" id="content" value="{{ old('content') }}" placeholder="content"><br>
            {!! $errors->first('url','<span class="help-block">:message</span>') !!}
            <input type="text" name="url" id="url" value="{{ old('url') }}" placeholder="url"><br>
            <button>Submit</button>
        </form>
    </main>

@stop
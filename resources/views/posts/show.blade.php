@extends('layouts.master')

@section('title')

	<title>Single Post</title>

@stop

@section('content')

	<main class="container">
        <h1>Single Post</h1>
        @if($_POST !== null)
        <h1>Title : {{ $post['title'] }}</h1>
        <a href="{{action('PostsController@edit',$post->id)}}"><span>edit</span></a>
         <p>ID : {{ $post['id'] }}</p>
        <p>{{ $post['content'] }}</p>
        <p>{{ $post['url'] }}</p>
        @endif

    </main>

@stop

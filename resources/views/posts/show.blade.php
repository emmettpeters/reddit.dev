@extends('layouts.master')

@section('title')

	<title>Single Post</title>

@stop

@section('content')

	<main class="container">
        <h1>Single Post</h1>
        @if($_POST !== null)
        <h1>Title : {{ $post['title'] }}</h1>
         <p>ID : {{ $post['id'] }}</p>
        <p>{{ $post['content'] }}</p>
        <p>{{ $post['url'] }}</p>
        <p>{{ $post->user->name }}</p>
        @endif
        @if(Auth::id()==$post->user_id)
        <a href="{{action('PostsController@edit',$post->id)}}"><span>edit</span></a>
        @endif

    </main>

@stop

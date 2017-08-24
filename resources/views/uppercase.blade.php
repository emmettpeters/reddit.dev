@extends('layouts.master')

@section('title')
<title>UpperCased String</title>
@stop

@section('content')
<div class="container">
	<h1>UpperCased String : {{ $upString }} </h1>
	<a href="{{action('HomeController@lowercase', [$upString])}}">Lowercase the Word</a>
</div>
@stop
@extends('layouts.master')

@section('title')
<title>LowerCased String</title>
@stop

@section('content')
<div class="container">
	<h1>LowerCased String : {{ $lowString }} </h1>
	<a href="{{action('HomeController@uppercase', [$lowString])}}">Uppercase the Word</a>
</div>
@stop
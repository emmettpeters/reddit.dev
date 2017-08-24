@extends('layouts.master')

@section('title')
<title>Increment Number</title>
@stop

@section('content')
<div class="container">
	<h1>Number to Increment : {{ $number }} </h1>
	<a href="{{action('HomeController@increment', [$number])}}">Increment the number</a>
</div>
@stop

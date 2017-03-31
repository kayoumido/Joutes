<!-- @author Dessaules Loïc -->

@extends('layout')

@section('content')
	<div class="container">
        <a href="{{URL::previous()}}"><i class="fa fa-4x fa-arrow-circle-left return" aria-hidden="true"></i></a>

		<h1>{{$pool->tournament->name}} - {{$pool->poolName}}</h1>
	</div>
@stop
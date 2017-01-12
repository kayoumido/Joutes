@extends('layout')

@section('content')

	List team

	@foreach ($teams as $team)
		{{ $team->name }}
	@endforeach

@stop
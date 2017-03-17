<!-- @author Dessauges Antoine -->

@extends('layout')

@section('content')
	<div id="container">
		<a href="{{ route('events.index') }}"><i class="fa fa-4x fa-arrow-circle-left return" aria-hidden="true"></i></a>	
		<h1>Créer un événement</h1>

		@if ($errors->any())
			<div class="alert alert-danger">
	            @foreach ($errors->all() as $error)
	                {{ $error }}<br>
	            @endforeach
	        </div>
        @endif

		{{ Form::open(array('url' => route('events.store'), 'method' => 'post', 'enctype' => 'multipart/form-data')) }}

			{{ Form::label('name', 'Nom : ') }}
			{{ Form::text('name', null) }}
			<br>
			{{ Form::label('img', 'Image : ') }}
			{{ Form::file('img', null) }}
			<br>
			<br>
			{{ Form::button('Créer', array('class' => 'btn btn-success formSend')) }}

		{{ Form::close() }}

		<br>


	</div>
@stop

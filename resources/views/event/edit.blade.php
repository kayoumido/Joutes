<!-- @author Dessauges Antoine -->

@extends('layout')

@section('content')
	<div id="container">
		<a href="{{ route('events.index') }}"><i class="fa fa-4x fa-arrow-circle-left return" aria-hidden="true"></i></a>	
		<h1>Editer un événement</h1>

		@if ($errors->any())
			<div class="alert alert-danger">
	            @foreach ($errors->all() as $error)
	                {{ $error }}<br>
	            @endforeach
	        </div>
        @endif

		{{ Form::open(array('url' => route('events.update', $event->id), 'method' => 'put', 'id' => 'formEvent', 'enctype' => 'multipart/form-data')) }}

			{{ Form::label('name', 'Nom : ') }}
			{{ Form::text('name', $event->name) }}
			<br>
			{{ Form::label('img', 'Image : ') }}
			{{ Form::file('img', null) }}
			<br>
			<br>
			{{ Form::button('Enregistrer', array('class' => 'btn btn-success formSend')) }}

		{{ Form::close() }}

		<br>


	</div>
@stop

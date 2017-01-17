@extends('layout')

@section('content')
	<div id="container">
		<a href="{{ route('sports.index') }}"><img src="{{ asset("images/return-arrow.png") }}" alt="Retour en arrière" class="return"></a>	
		<h1>Créer un sport</h1>

		@if(isset($error))
			<div class="alert alert-danger">
				{{ $error }}
			</div>
		@endif

		{{ Form::open(array('url' => route('sports.store'), 'method' => 'post')) }}

			{{ Form::label('name', 'Nom : ') }}
			{{ Form::text('name', null) }}
			<br>
			{{ Form::label('description', 'Description : ') }}
			{{ Form::text('description', null) }}
			<br>
			<br>
			{{ Form::submit('Créer', array('class' => 'btn btn-success')) }}

		{{ Form::close() }}

		<br>
		
		
	</div>
@stop
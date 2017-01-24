@extends('layout')

@section('content')
	<div id="container">
		<a href="{{ route('sports.index') }}"><img src="{{ asset("images/return-arrow.png") }}" alt="Retour en arrière" class="return"></a>	
		<h1>Créer un sport</h1>

		@if ($errors->any())
			<div class="alert alert-danger">
	            @foreach ($errors->all() as $error)
	                {{ $error }}<br>        
	            @endforeach
	        </div>
        @endif

		{{ Form::open(array('url' => route('sports.store'), 'method' => 'post', 'id' => 'formSport')) }}

			{{ Form::label('name', 'Nom : ') }}
			{{ Form::text('name', null) }}
			<br>
			{{ Form::label('description', 'Description : ') }}
			{{ Form::text('description', null) }}
			<br>
			<br>
			{{ Form::button('Créer', array('class' => 'btn btn-success formSend')) }}

		{{ Form::close() }}

		<br>
		
		
	</div>
@stop
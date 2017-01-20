@extends('layout')

@section('content')
	<div id="container">	
		<a href="{{ route('sports.index') }}"><img src="{{ asset("images/return-arrow.png") }}" alt="Retour en arrière" class="return"></a>
		<h1>Editer un sport</h1>

		@if ($errors->any())
			<div class="alert alert-danger">
	            @foreach ($errors->all() as $error)
	                {{ $error }}<br>        
	            @endforeach
	        </div>
        @endif

		{{ Form::open(array('url' => route('sports.update', $sport->id), 'method' => 'put')) }}

			{{ Form::label('name', 'Nom : ') }}
			{{ Form::text('name', $sport->name) }}
			<br>
			{{ Form::label('description', 'Description : ') }}
			{{ Form::text('description', $sport->description) }}
			<br>
			<br>
			{{ Form::submit('Enregistrer', array('class' => 'btn btn-success')) }}

		{{ Form::close() }}	
		
	</div>
@stop
@extends('layout')

@section('content')
	<div id="container">	
		<h1>Ajouter un sport</h1>

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
			<a href="{{ route('sports.index') }}"><input type="button" class="btn btn-primary" value="Retour"></a>
			{{ Form::submit('Créer', array('class' => 'btn btn-success')) }}

		{{ Form::close() }}

		<br>
		
		
	</div>
@stop
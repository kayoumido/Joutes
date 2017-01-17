@extends('layout')

@section('content')
	<div id="container">	
		<h1>Editer un sport</h1>

		@if(isset($error))
			<div class="alert alert-danger">
				{{ $error }}
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
			<a href="{{ route('sports.index') }}"><input type="button" class="btn btn-primary" value="Retour"></a>
			{{ Form::submit('Enregistrer', array('class' => 'btn btn-success')) }}

		{{ Form::close() }}	
		
	</div>
@stop
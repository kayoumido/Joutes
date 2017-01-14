@extends('layout')

@section('content')
	<div id="container">	
		<h1>Edition</h1>

		{{ Form::open(array('url' => route('sports.update', $sport->id), 'method' => 'put')) }}

			{{ Form::label('name', 'Nom du sport : ') }}
			{{ Form::text('name', $sport->name) }}
			{{ Form::submit('Enregistrer') }}

		{{ Form::close() }}

		<br>
		
		<a href="{{ route('sports.index') }}"><input type="button" value="Retour"></a>
	</div>
@stop
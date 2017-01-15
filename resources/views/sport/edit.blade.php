@extends('layout')

@section('content')
	<div id="container">	
		<h1>Editer un sport</h1>

		@if(isset($error))
			<div class="form-error">
				{{ $error }}
			</div>
		@endif

		{{ Form::open(array('url' => route('sports.update', $sport->id), 'method' => 'put')) }}

			{{ Form::label('name', 'Nom du sport : ') }}
			{{ Form::text('name', $sport->name) }}
			{{ Form::submit('Enregistrer', array('class' => 'btn btn-success')) }}

		{{ Form::close() }}

		<br>
		
		<a href="{{ route('sports.index') }}"><input type="button" class="btn btn-primary" value="Retour"></a>
	</div>
@stop
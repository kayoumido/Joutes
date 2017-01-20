<!-- @author Dessauges Antoine -->
@extends('layout')

@section('content')
	<div id="container">	
		<h1>Editer une team</h1>

		@if(isset($error))
			<div class="alert alert-danger">
				{{ $error }}
			</div>
		@endif

		{{ Form::open(array('url' => route('teams.update', $team->id), 'method' => 'put')) }}

			{{ Form::label('name', 'Nom de la team : ') }}
			{{ Form::text('name', $team->name) }}
			{{ Form::submit('Enregistrer', array('class' => 'btn btn-success')) }}

		{{ Form::close() }}

		<br>
		
		<a href="{{ route('teams.index') }}"><input type="button" class="btn btn-primary" value="Retour"></a>
	</div>
@stop
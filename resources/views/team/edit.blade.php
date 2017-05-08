<!-- @author Dessauges Antoine -->
@extends('layout')

@section('content')
	<div id="container">
		<a href="{{ route('teams.index') }}"><i class="fa fa-4x fa-arrow-circle-left return" aria-hidden="true"></i></a>
		<h1>Editer une équipe</h1>

		@if(isset($error))
			<div class="alert alert-danger">
				{{ $error }}
			</div>
		@endif

		{{ Form::open(array('url' => route('teams.update', $team->id), 'method' => 'put')) }}

			{{ Form::label('name', "Nom de l'équipe : ") }}
			{{ Form::text('name', $team->name) }}
			{{ Form::submit('Enregistrer', array('class' => 'btn btn-success')) }}

		{{ Form::close() }}

		<br>


	</div>
@stop

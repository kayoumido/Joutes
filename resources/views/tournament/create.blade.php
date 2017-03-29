<!-- @author Dessaules Loïc -->

@extends('layout')

@section('content')
	<div id="container">
		<a href="{{ route('tournaments.index') }}"><i class="fa fa-4x fa-arrow-circle-left return" aria-hidden="true"></i></a>	
		<h1>Créer un tournoi</h1>

		@if ($errors->any() || isset($customErrors))
			<div class="alert alert-danger">
				@if ($errors->any())
		            @foreach ($errors->all() as $error)
		                {{ $error }}<br>
		            @endforeach
		        @endif
		        @if (isset($customErrors))
		        	@foreach ($customErrors as $customError)
		                {{ $customError }}<br>
		            @endforeach
		        @endif
	        </div>
        @endif

		{{ Form::open(array('url' => route('tournaments.store'), 'method' => 'post', 'id' => 'formTournament', 'enctype' => 'multipart/form-data')) }}

			{{ Form::hidden('eventId', $event->id) }}

			{{ Form::label('name', 'Nom :') }}
			{{ Form::text('name', null) }}
			<br>
			<br>
			{{ Form::label('Sport', 'Sport :') }}
			{{ Form::select('sport', array('Avec terrains' => $dropdownListSportsWithCourt, 'Sans terrains' => $dropdownListSportsWithNoCourt), null, array('placeholder' => 'Sélectionner', 'class' => 'allSameStyle', 'id' => 'sport')) }}
			<br>
			<br>
			{{ Form::label('startDate', 'Date de début :') }}
			{{ Form::date('startDate', \Carbon\Carbon::now(), array('class' => 'allSameStyle')) }}
			<br>
			<br>
			{{ Form::label('startTime', 'Heure de début :') }}
			{{ Form::text('startTime', null, array('placeholder' => 'hh:mm')) }}
			<br>
			<br>
			{{ Form::label('teams', 'Équipes participantes :') }}
			{{ Form::select('teams[]', $dropdownListTeams, null, array('class' => 'allSameStyle', 'id' => 'multiple-teams-select', 'multiple')) }}
			<br>
			<br>
			{{ Form::label('img', 'Image : ') }}
			{{ Form::file('img', null) }}
			<br>
			<br>
			{{ Form::button('Créer', array('class' => 'btn btn-success formSend')) }}

		{{ Form::close() }}

		<br>


	</div>
@stop

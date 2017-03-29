<!-- @author Dessaules Loïc -->

@extends('layout')

@section('content')
	<div id="container">
		<a href="{{ route('tournaments.index') }}"><i class="fa fa-4x fa-arrow-circle-left return" aria-hidden="true"></i></a>	
		<h1>Modifier un tournoi</h1>

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

		{{ Form::open(array('url' => route('tournaments.update', $tournament->id), 'method' => 'put', 'id' => 'formTournament', 'enctype' => 'multipart/form-data')) }}

			{{ Form::label('name', 'Nom :') }}
			{{ Form::text('name', $tournament->name) }}
			<br>
			<br>
			{{ Form::label('Sport', 'Sport :') }}
			@if(!empty($sport)/*Normal case : a sport is linked to the tournament*/)
				{{ Form::select('sport', array('Terrain(s) lié(s)' => $dropdownListSportsWithCourt, 'Aucun terrain lié' => $dropdownListSportsWithNoCourt), $sport->id, array('placeholder' => 'Sélectionner', 'class' => 'allSameStyle', 'id' => 'sport')) }}
			@else
				{{ Form::select('sport', array('Avec terrains' => $dropdownListSportsWithCourt, 'Sans terrains' => $dropdownListSportsWithNoCourt), null, array('placeholder' => 'Sélectionner', 'class' => 'allSameStyle', 'id' => 'sport')) }}
			@endif
			<br>
			<br>
			{{ Form::label('startDate', 'Date de début :') }}
			{{ Form::date('startDate', $tournament->start_date, array('class' => 'allSameStyle')) }}
			<br>
			<br>
			{{ Form::label('startTime', 'Heure de début :') }}
			{{ Form::text('startTime', date("H:i", strtotime($tournament->start_date)), array('placeholder' => 'hh:mm')) }}
			<br>
			<br>
			{{ Form::label('teams', 'Équipes participantes :') }}
			@if(!empty($teamsAreParticipatingId))
				{{ Form::select('teams[]', $dropdownListTeams, $teamsAreParticipatingId, array('class' => 'allSameStyle', 'id' => 'multiple-teams-select', 'multiple')) }}
			@else
				{{ Form::select('teams[]', $dropdownListTeams, null, array('class' => 'allSameStyle', 'id' => 'multiple-teams-select', 'multiple')) }}
			@endif
			<br>
			<br>
			{{ Form::label('img', 'Image : ') }}
			{{ Form::file('img', null) }}
			<br>
			<br>
			{{ Form::button('Enregistrer', array('class' => 'btn btn-success formSend')) }}

		{{ Form::close() }}

		<br>


	</div>
@stop

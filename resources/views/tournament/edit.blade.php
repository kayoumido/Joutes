@extends('layout')

@section('content')
	<div id="container">
		<a href="{{ route('tournaments.index') }}"><img src="{{ asset("images/return-arrow.png") }}" alt="Retour en arrière" class="return"></a>	
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

		{{ Form::open(array('url' => route('tournaments.update', $tournament->id), 'method' => 'put')) }}

			{{ Form::label('name', 'Nom :') }}
			{{ Form::text('name', $tournament->name) }}
			<br>
			<br>
			{{ Form::label('Sport', 'Sport :') }}
			{{ Form::select('sport', $dropdownList, $sport->id, array('placeholder' => 'Sélectionner', 'class' => 'allSameStyle')) }}
			<br>
			(la liste contient uniquement les sports qui ont au minimum un terrain lié)
			<br>
			<br>
			{{ Form::label('startDate', 'Date de début :') }}
			{{ Form::date('startDate', $tournament->start_date, array('class' => 'allSameStyle')) }}
			<br>
			<br>
			{{ Form::label('startTime', 'Heure de début :') }}
			{{ Form::text('startTime', date("H:i", strtotime($tournament->start_time)), array('placeholder' => 'hh:mm')) }}
			<br>
			<br>
			{{ Form::label('endDate', 'Date de fin :') }}
			{{ Form::date('endDate', $tournament->end_date, array('class' => 'allSameStyle')) }}
			<br>
			<br>
			{{ Form::submit('Enregistrer', array('class' => 'btn btn-success')) }}

		{{ Form::close() }}

		<br>
		
		
	</div>
@stop
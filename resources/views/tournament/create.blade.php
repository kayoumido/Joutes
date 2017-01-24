@extends('layout')

@section('content')
	<div id="container">
		<a href="{{ route('tournaments.index') }}"><img src="{{ asset("images/return-arrow.png") }}" alt="Retour en arrière" class="return"></a>	
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

		{{ Form::open(array('url' => route('tournaments.store'), 'method' => 'post', 'id' => 'formTournament')) }}

			{{ Form::label('name', 'Nom :') }}
			{{ Form::text('name', null) }}
			<br>
			<br>
			{{ Form::label('Sport', 'Sport :') }}
			{{ Form::select('sport', $dropdownList, null, array('placeholder' => 'Sélectionner', 'class' => 'allSameStyle', 'id' => 'sport')) }}
			<br>
			(la liste contient uniquement les sports qui ont au minimum un terrain lié)
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
			{{ Form::label('endDate', 'Date de fin :') }}
			{{ Form::date('endDate', \Carbon\Carbon::now(), array('class' => 'allSameStyle')) }}
			<br>
			<br>
			{{ Form::button('Créer', array('class' => 'btn btn-success formSend')) }}

		{{ Form::close() }}

		<br>
		
		
	</div>
@stop
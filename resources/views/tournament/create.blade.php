@extends('layout')

@section('content')
	<div id="container">
		<a href="{{ route('tournaments.index') }}"><img src="{{ asset("images/return-arrow.png") }}" alt="Retour en arrière" class="return"></a>	
		<h1>Créer un tournoi</h1>

		@if ($errors->any())
			<div class="alert alert-danger">
	            @foreach ($errors->all() as $error)
	                {{ $error }}<br>        
	            @endforeach
	        </div>
        @endif

		{{ Form::open(array('url' => route('tournaments.store'), 'method' => 'post')) }}

			{{ Form::label('name', 'Nom : ') }}
			{{ Form::text('name', null) }}
			<br>
			<br>
			{{ Form::label('Sport', 'Sport : ') }}
			{{ Form::select('sport', $dropdownList, null, array('placeholder' => 'Sélectionner', 'class' => 'allSameStyle')) }}
			<br>
			<br>
			{{ Form::label('startDate', 'Date de début : ') }}
			{{ Form::date('startDate', \Carbon\Carbon::now(), array('class' => 'allSameStyle')) }}
			<br>
			<br>
			{{ Form::label('startTime', 'Heure de début : ') }}
			{{ Form::text('startTime', null, array('placeholder' => 'hh:mm')) }}
			<br>
			<br>
			{{ Form::label('endDate', 'Date de fin : ') }}
			{{ Form::date('endDate', \Carbon\Carbon::now(), array('class' => 'allSameStyle')) }}
			<br>
			<br>
			{{ Form::submit('Créer', array('class' => 'btn btn-success')) }}

		{{ Form::close() }}

		<br>
		
		
	</div>
@stop
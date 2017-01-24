@extends('layout')

@section('content')
	<div id="container">
		<a href="{{ route('tournaments.index') }}"><img src="{{ asset("images/return-arrow.png") }}" alt="Retour en arrière" class="return"></a>
		<h1>{{ $tournament->name }}</h1>

		@if(isset($tournament->courts[0]))
			<p><strong>Sport :</strong> {{ $tournament->courts[0]->sport->name }}</p>
		@else
			<p><strong>Sport :</strong> Aucun, veuillez en choisir un.</p>
		@endif
		
		<p>
			<strong>Date de début :</strong> {{ date("d.m.Y", strtotime($tournament->start_date)) }}
			<br>
			<strong>Date de fin :</strong> {{ date("d.m.Y", strtotime($tournament->end_date)) }}
		</p>
		<p><strong>Heure de début :</strong> {{ date("H:i", strtotime($tournament->start_time)) }} </p>
		
		<div class="list-group">
		  	<div class="list-group-item active" style="background-color:#636b6f; border-color: #636b6f">
		    	<h4 class="list-group-item-heading">Terrain(s)</h4>
		  	</div>
		  	@foreach ($tournament->courts as $court)
		  		<div class="list-group-item">
					{{ $court->name }}
				</div>
			@endforeach
		</div>


	</div>
@stop

@extends('layout')

@section('content')
	<div id="container">
		<a href="{{ route('tournaments.index') }}"><img src="{{ asset("images/return-arrow.png") }}" alt="Retour en arrière" class="return"></a>
		<h1>{{ $tournament->name }}</h1>

		<p>Sport : {{ $tournament->courts[0]->sport->name }} </p>
		<p>Début du tournois : {{ date("d.m.Y", strtotime($tournament->start_date)) }} à {{ date("H:i", strtotime($tournament->start_time)) }}</p>
		<p>Date de fin : {{ date("d.m.Y", strtotime($tournament->end_date)) }}</p>
		<p>Terrains :</p>
		<ul>
			@foreach ($tournament->courts as $court)
				<li> {{ $court->name }} </li>
			@endforeach
		</ul>

		

	</div>
@stop

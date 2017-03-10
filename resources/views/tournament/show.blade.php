<!-- @author Dessaules Loïc -->

@extends('layout')

@section('content')
	<div class="container">
		<a href="{{ route('tournaments.index') }}"><i class="fa fa-4x fa-arrow-circle-left return" aria-hidden="true"></i></a>
		<h1>{{ $tournament->name }}</h1>

		@if(isset($tournament->sport))
			<p><strong>Sport :</strong> {{ $tournament->sport->name }}</p>
		@else
			<p><strong>Sport :</strong> Aucun, veuillez en choisir un.</p>
		@endif

		<p>
			<strong>Date de début :</strong> {{ date("d.m.Y", strtotime($tournament->start_date)) }}
			<br>
			<strong>Date de fin :</strong> {{ date("d.m.Y", strtotime($tournament->end_date)) }}
		</p>
		<p><strong>Heure de début :</strong> {{ date("H:i", strtotime($tournament->start_time)) }} </p>

		<table class="table">
			<thead>
				<tr>
					<th>Terrain(s)</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($tournament->sport->courts as $court)
		  		<tr>
					<th scope="row" class="name">{{$court->name}}</th>
				</tr>
				@endforeach
			</tbody>
		</table>


		<table class="table">
			<thead>
				<tr>
					<th>Équipe(s)</th>
				</tr>
			</thead>
			<tbody>
				@if(count($tournament->teams) > 0)
			  		@foreach ($tournament->teams as $team)
			  			<tr>
							<th scope="row" class="name">{{$team->name}}</th>
						</tr>
					@endforeach
				@else
					<div class="list-group-item">
						Aucune équipe pour l'instant ...
					</div>
			  	@endif
			</tbody>
		</table>


	</div>
@stop

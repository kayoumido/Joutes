<!-- @author Dessaules Loïc -->

@extends('layout')

@section('content')
	<div class="container">

		<a href="{{URL::previous()}}"><i class="fa fa-4x fa-arrow-circle-left return" aria-hidden="true"></i></a>

		<h1>{{ $tournament->name }}</h1>

		@if(isset($tournament->sport))
			<p><strong>Sport :</strong> {{ $tournament->sport->name }}</p>
		@else
			<p><strong>Sport :</strong> Aucun, veuillez en choisir un.</p>
		@endif

		<p>
			<strong>Début du tournois :</strong> {{ $tournament->start_date->format('d.m.Y à H:i') }}
		</p>

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
					<tr>
						<td>Aucune équipe pour l'instant ...</td>
					</tr>
			  	@endif
			</tbody>
		</table>


	</div>
@stop

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
				@if(count($tournament->sport->courts) > 0)
					@foreach ($tournament->sport->courts as $court)
			  		<tr>
						<th scope="row" class="name">{{$court->name}}</th>
					</tr>
					@endforeach
				@else
					<tr>
						<th scope="row" class="name">Aucun terrain pour l'instant ...</th>
					</tr>
				@endif
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


		@if (sizeof($tournament->pools) > 0)
			<!-- Stages and pools -->
			<ul class="nav nav-tabs" role="tablist" id="stages-tabs" data-count="{{$totalStage}}">
				@for ($i = 1; $i <= $totalStage; $i++)
					@if ($i == 1)
						<li class="nav-item active">
							<a class="nav-link active" data-toggle="tab" href="#stage{{$i}}" role="tab">Phase {{$i}}</a>
						</li>
					@else
						<li class="nav-item">
							<a class="nav-link" data-toggle="tab" href="#stage{{$i}}" role="tab">Phase {{$i}}</a>
						</li>
					@endif
				@endfor
			</ul>

			<div class="tab-content">
				@for ($i = 1; $i <= $totalStage; $i++)
					@if ($i == 1)
						<div class="tab-pane active" id="stage{{$i}}" role="tabpanel">
					@else
						<div class="tab-pane" id="stage{{$i}}" role="tabpanel">
					@endif
							<table class="table">
								<tbody>
									@foreach ($pools as $pool)
										@if ($pool->stage == $i)
										<tr>
											<th scope="row" class="name">
												<a href="{{route('tournaments.pools.show', [$tournament->id, $pool->id])}}">{{$pool->poolName}}</a>
											</th>
										</tr>
										@endif
									@endforeach
								</tbody>
							</table>
							
						</div>
				@endfor
			</div>
		@endif
		

@stop
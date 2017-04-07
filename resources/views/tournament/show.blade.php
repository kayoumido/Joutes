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

		<div class="row">
			<div class="col-lg-6">
				<table id="teams-table" class="table table-striped table-bordered" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th>Équipe(s)</th>
						</tr>
					</thead>
					<tbody>
						@if(count($tournament->teams) > 0)
					  		@foreach ($tournament->teams as $team)
					  			<tr>
									<td>{{$team->name}}</td>
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

			<div class="col-lg-6">
				<table id="courts-table" class="table table-striped table-bordered" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th>Terrain(s)</th>
						</tr>
					</thead>
					<tbody>
						@if(count($tournament->sport->courts) > 0)
							@foreach ($tournament->sport->courts as $court)
					  		<tr>
								<td>{{$court->name}}</td>
							</tr>
							@endforeach
						@else
							<tr>
								<td>Aucun terrain pour l'instant ...</td>
							</tr>
						@endif
					</tbody>
				</table>
			</div>
		</div>
		

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
							<table class="pools-table table table-hover table-striped table-bordered" cellspacing="0" width="100%" data-tournament="{{$tournament->id}}">
								<thead>
									<tr>
										<th>Poules</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($pools as $pool)
										@if ($pool->stage == $i)
										<tr>
											<td data-id="{{$pool->id}}">{{$pool->poolName}}</td>
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
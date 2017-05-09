<!-- @author Dessaules Loïc -->

@extends('layout')

@section('content')

	<div class="container">
        <a href="{{URL::previous()}}"><i class="fa fa-4x fa-arrow-circle-left return" aria-hidden="true"></i></a>

		<h1>{{$pool->tournament->name}} - {{$pool->poolName}}</h1>

		<br>

		<div id="match-block">

			<h2>Matchs et Résultats</h2>
			<h3>{{Carbon\Carbon::parse($pool->games[0]->start_time)->format('d.m.Y')}}</h3>
			
			<table id="matches">
				@foreach ($pool->games as $game)
					<!-- No teams - no score -->
					@if (empty($game->contender1->team) || empty($game->contender2->team))
						<tr>
							<td class="contender1">À définir</td>
							<td>{{Carbon\Carbon::parse($game->start_time)->format('H:i')}}</td>
							<td class="contender2">À définir</td>
						</tr>
					@else
						<!-- teams - no score -->
						@if(empty($game->score_contender1) || empty($game->score_contender2))
							<tr>
								<td class="contender1">{{$game->contender1->team->name}}</td>
								<td>{{Carbon\Carbon::parse($game->start_time)->format('H:i')}}</td>
								<td class="contender2">{{$game->contender2->team->name}}</td>
							</tr>
						@else
							<!-- teams and score -->
							
							<tr>
								<td class="contender1">{{$game->contender1->team->name}}</td>
								<td class="score1">{{$game->score_contender1}}</td>
								<td> - </td>
								<td class="score2">{{$game->score_contender2}}</td>
								<td class="contender2">{{$game->contender2->team->name}}</td>
								<td class="action"><i class="fa fa-lg fa-pencil action" aria-hidden="true"></td>
							</tr>
						@endif
					@endif
				@endforeach
			</table>

			<h2>Classement actuel</h2>

			@if(sizeof($pool->rankings()) > 0)
				<table id="pool-rankings-table" class="table table-striped table-bordered translate" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th>#</th>
							<th>Équipes</th>
							<th>Pts</th>
							<th>G</th>
							<th>P</th>
							<th>N</th>
							<th>+/-</th>
						</tr>
					</thead>
					<tbody>
						@for ($i = 0; $i < sizeof($pool->rankings()); $i++)
							<tr>
								<td>{{$i+1}}</td>
								<td>{{$pool->rankings()[$i]["team"]}}</td>
								<td>{{$pool->rankings()[$i]["score"]}}</td>
								<td>{{$pool->rankings()[$i]["W"]}}</td>
								<td>{{$pool->rankings()[$i]["L"]}}</td>
								<td>{{$pool->rankings()[$i]["D"]}}</td>
								<td>{{$pool->rankings()[$i]["+-"]}}</td>
							</tr>
						@endfor
					</tbody>
				</table>
			@else
				Indisponible
			@endif
		</div>

	</div>
@stop
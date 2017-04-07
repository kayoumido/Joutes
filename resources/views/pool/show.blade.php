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
					@if (empty($game->contender1->team))
						<tr>
							<td class="contender1">À définir</td>
							<td>{{Carbon\Carbon::parse($game->start_time)->format('H:i')}}</td>
							<td class="contender2">À définir</td>
						</tr>
					@else
						@if(empty($game->score_contender1))
								<tr>
									<td class="contender1">{{$game->contender1->team->name}}</td>
									<td>{{Carbon\Carbon::parse($game->start_time)->format('H:i')}}</td>
									<td class="contender2">{{$game->contender2->team->name}}</td>
								</tr>
						@else
							
								<tr>
									<td class="contender1">{{$game->contender1->team->name}}</td>
									<td>{{$game->score_contender1}} - {{$game->score_contender2}}</td>
									<td class="contender2">{{$game->contender2->team->name}}</td>
								</tr>
						@endif
					@endif
				@endforeach
			</table>

		</div>

	</div>
@stop
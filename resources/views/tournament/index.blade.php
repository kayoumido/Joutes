<!-- @author Dessaules Loïc -->
@extends('layout')

@section('content')
	<div class="container boxList">
		@if ($fromEvent)
			<a href="{{ route('events.index') }}">
		@else
			<a href="/">
		@endif
		<img src="{{ asset("images/return-arrow.png") }}" alt="Retour en arrière" class="return"></a>
		@if ($fromEvent)
			<h1>Tournois de l'évenement {{ $eventName }}</h1>
		@else
			<h1>Tournois</h1>
		@endif
		

		<input type="search" placeholder="Recherche" class="search form-control">

		<div class="row searchIn">

			@foreach ($tournaments as $tournament)
				<div class="col-md-4 hideSearch">
					<a href="{{route('tournaments.show', $tournament->id)}}" title="Voir le tournoi">
						<div class="box">

							<div class="img">
								<div class="title name"> {{$tournament->name}} </div>
							</div>
							<div class="infos">
								<div class="sport"> {{ $tournament->courts[0]->sport->name }} </div>
								<div class="hour"> {{$tournament->start_time}} à {{$tournament->end_time}} </div>
								<div class="date"> {{$tournament->start_date->format('d.m.Y')}} au {{$tournament->end_date->format('d.m.Y')}} </div>

								<a href="{{route('tournaments.edit', $tournament->id)}}" title="Éditer le tournoi" class="edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
								{{ Form::open(array('url' => route('tournaments.destroy', $tournament->id), 'method' => 'delete')) }}
									<button type="button" class="button-delete" data-name="{{ $tournament->name }}" data-type="tournament">
					                    <i class="fa fa-trash-o" aria-hidden="true"></i>
					                </button>
								{{ Form::close() }}
							</div>

						</div>
					</a>
				</div>
			@endforeach

		</div>


		<a href="{{route('tournaments.create')}}" title="Créer un tournoi"><i class="fa fa-plus-circle" aria-hidden="true"></i></a>

	</div>
@stop
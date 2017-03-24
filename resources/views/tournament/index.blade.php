<!-- @author Dessaules Loïc -->
@extends('layout')

@section('content')
	<div class="container boxList">
		@if ($fromEvent)
			<a href="{{ route('events.index') }}"><i class="fa fa-4x fa-arrow-circle-left return" aria-hidden="true"></i></a>
		@endif
		
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
								<div class="sport"> {{ $tournament->sport->name }} </div>
								<div class="date"> {{$tournament->start_date->format('d.m.Y à H:i')}} </div>

								@if(Auth::check())
									@if(Auth::user()->role == 'administrator')
										<a href="{{route('tournaments.edit', $tournament->id)}}" title="Éditer le tournoi" class="edit"><i class="fa fa-lg fa-pencil action" aria-hidden="true"></i></a>
										<!--{{ Form::open(array('url' => route('tournaments.destroy', $tournament->id), 'method' => 'delete')) }}
											<button type="button" class="button-delete" data-name="{{ $tournament->name }}" data-type="tournament">
							                    <i class="fa fa-lg fa-trash-o action" aria-hidden="true"></i>
							                </button>
										{{ Form::close() }}-->
									@endif
								@endif

							</div>

						</div>
					</a>
				</div>
			@endforeach

		</div>

		@if(Auth::check())
			@if(Auth::user()->role == 'administrator')
				<a href="{{route('tournaments.create')}}" title="Créer un tournoi"><i class="fa fa-plus-circle fa-4x" aria-hidden="true"></i></a>
			@endif
		@endif
		
	</div>
@stop

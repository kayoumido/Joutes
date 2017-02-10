<!-- @author Dessauges Antoine -->
@extends('layout')

@section('content')
	<div class="container boxList">
		<h1>Evénements</h1>

		<input type="search" placeholder="Recherche" class="search form-control">

		<div class="row searchIn">

			@foreach ($events as $event)
				<div class="col-md-4 hideSearch">
					<a href="{{route('events.tournaments.index', $event->id)}}" title="Voir l'événement">
						<div class="box">

							<div class="img">
								<div class="title name"> {{$event->name}} </div>
							</div>
							<div class="infos">

								<!-- <a href="{{route('events.edit', $event->id)}}" title="Éditer le événement" class="edit"><i class="fa fa-pencil fa-lg action" aria-hidden="true"></i></a>
								{{ Form::open(array('url' => route('events.destroy', $event->id), 'method' => 'delete')) }}
									<button type="button" class="button-delete" data-name="{{ $event->name }}" data-type="tournament">
					                    <i class="fa fa-trash-o fa-lg action" aria-hidden="true"></i>
					                </button>
								{{ Form::close() }} -->
							</div>

						</div>
					</a>
				</div>
			@endforeach

		</div>


		<!-- <a href="{{route('events.create')}}" title="Créer un événement"><i class="fa fa-plus-circle fa-4x" aria-hidden="true"></i></a> -->

	</div>
@stop

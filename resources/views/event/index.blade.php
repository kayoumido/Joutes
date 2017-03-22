<!-- @author Dessauges Antoine -->
@extends('layout')

@section('content')
	<div class="container boxList">
		<h1>Evénements</h1>

		<input type="search" placeholder="Recherche" class="search form-control">

		<div class="row searchIn">

			@foreach ($events as $event)
				<div class="col-md-4 hideSearch">
					<div class="box">
						<div class="imgBox">
							<img src="{{ url('event_img/'.$event->img) }}" alt="Image de l'événement">
							<a href="{{route('events.tournaments.index', $event->id)}}" title="Voir l'événement">
								<div class="title name"> {{$event->name}} </div>
							</a>
						</div>
					
						<div class="infos">
							@if(Auth::check())
								@if(Auth::user()->role == 'administrator')
									{{ Form::open(array('url' => route('events.import.store', $event->id), 'method' => 'post')) }}
										{{ Form::button('', array('class' => 'import fa fa-download fa-lg action')) }}
									{{ Form::close() }}

									<a href="{{route('events.edit', $event->id)}}" title="Éditer le événement" class="edit"><i class="fa fa-pencil fa-lg action" aria-hidden="true"></i></a>
									
									{{--{{ Form::open(array('url' => route('events.destroy', $event->id), 'method' => 'delete')) }}
										<button type="button" class="button-delete" data-name="{{ $event->name }}" data-type="tournament">
						                    <i class="fa fa-trash-o fa-lg action" aria-hidden="true"></i>
						                </button>
									{{ Form::close() }} --}}
								@endif
							@endif
						</div>

					</div>
				</div>
			@endforeach

		</div>
		<a href="{{route('events.create')}}" title="Créer un événement"><i class="fa fa-plus-circle fa-4x" aria-hidden="true"></i></a>

	</div>
@stop

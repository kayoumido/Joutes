@extends('layout')

@section('content')
	<div id="container">
		<a href="/"><img src="{{ asset("images/return-arrow.png") }}" alt="Retour en arrière" class="return"></a>
		<h1>Tournois</h1>
		<table>
			<tr>
				<th>Nom</th>
				<th>Sport</th>
				<th>Action</th>
			</tr>
			@foreach ($tournaments as $tournament)
				<tr>
					<td class="name" style="width:40%"><a href="{{route('tournaments.show', $tournament->id)}}" title="Voir le tournoi">{{$tournament->name}}</a></td>
					@if(isset($tournament->courts[0]))
						<td style="width:40%">{{ $tournament->courts[0]->sport->name }}</td>
					@else
						<td style="width:40%">Aucun sport</td>
					@endif
					
					<td class="action" style="width:20%">
						<a href="{{route('tournaments.edit', $tournament->id)}}" title="Éditer le tournoi" class="edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
						{{ Form::open(array('url' => route('tournaments.destroy', $tournament->id), 'method' => 'delete')) }}
							<button type="button" class="button-delete" data-name="{{ $tournament->name }}" data-type="tournament">
			                    <i class="fa fa-trash-o" aria-hidden="true"></i>
			                </button>
						{{ Form::close() }}
					</td>
				</tr>
			@endforeach
		</table>

		<br>

		<a href="{{route('tournaments.create')}}" title="Créer un tournoi"><input type="button" value="Nouveau", class="btn btn-primary"></a>

	</div>
@stop
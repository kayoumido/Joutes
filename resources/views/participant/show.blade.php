<!-- @author Dessauges Antoine -->
@extends('layout')

@section('content')

	<div class="container">
		<a href="{{ route('participants.index') }}"><i class="fa fa-4x fa-arrow-circle-left return" aria-hidden="true"></i></a>

		<h1> {{ $participant->last_name }} {{ $participant->first_name }}</h1>

		@if (isset($infos))
			<div class="alert alert-success">
				{{ $infos }}
			</div>
		@endif

		<h2>Equipes du participant</h2>


		@if ( count($participant->teams) == 0  )
			<div class="alert alert-danger">
				Aucun équipe lié à ce membre !
			</div>
		@else
			<table class="table">

				<thead>
					<tr>
						<th>Nom de l'équipe</th>
						<th class="options">Actions</th>
					</tr>
				</thead>

				<tbody>

				  	@foreach ($participant->teams as $team)
						<tr>
					      <th scope="row" class="name"> {{ $team->name }} </th>
					      <td>
						      {{ Form::open(array('url' => route('teams.participants.destroy', [$team->pivot['participant_id'], $team->pivot['team_id']]), 'method' => 'delete')) }}
						      	<button type="submit" class="button-delete" data-type="memberTeam" data-name='"{{ $participant->last_name }} {{ $participant->first_name }}" de "{{ $team->name }}"'>
						      		<i class="fa fa-trash-o fa-lg action" aria-hidden="true"></i>
						      	</button>
						      {{ Form::close() }}
					      </td>
					    </tr>

					@endforeach

			  	</tbody>

			</table>
		@endif


		<h2>Ajouter ce membre à une team</h2>
		@if (isset($error))
			<div class="alert alert-danger">
				{{ $error }}
			</div>
		@else
			{{ Form::open(array('url' => route('teams.participants.store',  $participant->id), 'method' => 'post')) }}
				
				{{ Form::checkbox('isCapitain', true) }} Capitain
				{{ Form::select('team', $dropdownList, null, ['placeholder' => 'Sélectionner', 'class' => 'form-control addMember']) }}


			{{ Form::close() }}

		@endif

	</div>

@stop

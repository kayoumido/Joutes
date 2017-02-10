<!-- @author Dessauges Antoine -->
@extends('layout')

@section('content')


	<div class="container">
		<a href="{{ route('teams.index') }}"><i class="fa fa-4x fa-arrow-circle-left return" aria-hidden="true"></i></a>

		<h1> {{ $team->name }}</h1>

		@if (isset($infos))
			<div class="alert alert-success">
				{{ $infos }}
			</div>
		@endif

		<h2>Membres de l'équipe</h2>

		@if ( count($team->participants) == 0  )
			<div class="alert alert-danger">
				Aucun membre dans cette équipe !
			</div>
		@else
			<table class="table">

				<thead>
					<tr>
						<th>Nom du membre</th>
						<th class="options">Actions</th>
					</tr>
				</thead>

				<tbody>

				  	@foreach ($team->participants as $participant)
						<tr>
					      <th scope="row" class="name"> {{ $participant->last_name }} {{ $participant->first_name }} </th>
					      <td> 
						      {{ Form::open(array('url' => route('teams.participants.destroy', [$participant->pivot['fk_participants'], $participant->pivot['fk_teams']]), 'method' => 'delete')) }}
						      	<button type="submit" class="button-delete" data-type="teamMember" data-name="{{ $participant->last_name }} {{ $participant->first_name }}">
						      		<i class="fa fa-lg fa-trash-o action" aria-hidden="true"></i>
						      	</button>
						      {{ Form::close() }}
					      </td>
					    </tr>

					@endforeach

			  	</tbody>

			</table>
		@endif

		<h2>Ajouter un membre</h2>
		@if (isset($error))
			<div class="alert alert-danger">
				{{ $error }}
			</div>
		@else
			{{ Form::open(array('url' => route('teams.participants.store',  $team->id), 'method' => 'post')) }}


				{{ Form::select('pepole', $dropdownList, null, ['placeholder' => 'Sélectionner', 'class' => 'form-control addMember']) }}


			{{ Form::close() }}

		@endif

	</div>

@stop

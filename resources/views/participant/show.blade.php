@extends('layout')

@section('content')

	<div id="container">
		<a href="{{ route('participants.index') }}"><img src="{{ asset("images/return-arrow.png") }}" alt="Retour en arrière" class="return"></a>

		<h1> {{ $participant->last_name }} {{ $participant->first_name }}</h1>
		<h2>Equipes du participant</h2>

		<table>

			<thead>
				<tr>
					<th>Nom de l'équipe</th>
					<th>Options</th>
				</tr>
			</thead>

			<tbody>

			  	@foreach ($participant->teams as $team) 
					<tr>
				      <td class="name"> {{ $team->name }} </td>
				      <td> 
					      {{ Form::open(array('url' => route('teams.participants.destroy', [$team->pivot['fk_participants'], $team->pivot['fk_teams']]), 'method' => 'delete')) }}
					      	<button type="submit" class="button-delete" data-type="memberTeam" data-name='"{{ $participant->last_name }} {{ $participant->first_name }}" de "{{ $team->name }}"'>
					      		<i class="fa fa-trash-o" aria-hidden="true"></i> 
					      	</button>
					      {{ Form::close() }}
				      </td>
				    </tr>

				@endforeach
		    	
		  	</tbody>

		</table>


		<h2>Ajouter ce membre à une team</h2>
		@if (isset($error))
			<div class="alert alert-danger">
				{{ $error }}
			</div>
		@else
			{{ Form::open(array('url' => route('teams.participants.store',  $participant->id), 'method' => 'post')) }}

				
				{{ Form::select('team', $dropdownList, null, ['placeholder' => 'Sélectionner', 'class' => 'form-control addMember']) }}


			{{ Form::close() }}
		
		@endif

	</div>
	
@stop
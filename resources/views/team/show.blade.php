@extends('layout')

@section('content')

	<h1> {{ $team->name }}</h1>
	<h2>Membres de l'équipe</h2>

	<table>

		<thead>
			<tr>
				<th>Nom du membre</th>
				<th>Options</th>
			</tr>
		</thead>

		<tbody>

		  	@foreach ($team->participants as $participant) 
				<tr>
			      <td> {{ $participant->last_name }}{{ $participant->first_name }} </td>
			      <td> 
				      {{ Form::open(array('url' => route('teams.participants.destroy', [$participant->pivot['fk_participants'], $participant->pivot['fk_teams']]), 'method' => 'delete')) }}
				      	<button type="submit" class="button-delete">
				      		<i class="fa fa-trash-o" aria-hidden="true"></i>
				      	</button>
				      {{ Form::close() }}
			      </td>
			    </tr>

			@endforeach
	    	
	  	</tbody>

	</table>

	<h2>Ajouter un membre</h2>
	<select>
		<option> Séléctionner </option>
		@foreach ($pepoleNoTeam as $pepole)
			<option> {{ $pepole->last_name }} {{ $pepole->first_name }} </option>
		@endforeach

	</select>

	
@stop
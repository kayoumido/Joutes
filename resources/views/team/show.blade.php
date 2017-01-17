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
			      <td> {{ $participant->last_name }} {{ $participant->first_name }} </td>
			      <td> 
				      {{ Form::open(array('url' => route('teams.participants.destroy', [$participant->pivot['fk_teams'], $participant->pivot['fk_participants']]), 'method' => 'delete')) }}
				      	<button type="submit" class="button-delete">
				      		<i class="fa fa-trash-o" aria-hidden="true"></i>
				      	</button>
				      {{ Form::close() }}
			      </td>
			    </tr>

			@endforeach
	    	
	  	</tbody>

	</table>

@stop
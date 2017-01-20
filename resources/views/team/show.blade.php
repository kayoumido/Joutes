<!-- @author Dessauges Antoine -->
@extends('layout')

@section('content')

	
	<div id="container">
		<a href="{{ route('teams.index') }}"><img src="{{ asset("images/return-arrow.png") }}" alt="Retour en arrière" class="return"></a>

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
					      <td class="name"> {{ $participant->last_name }} {{ $participant->first_name }} </td>
					      <td> 
						      {{ Form::open(array('url' => route('teams.participants.destroy', [$participant->pivot['fk_participants'], $participant->pivot['fk_teams']]), 'method' => 'delete')) }}
						      	<button type="submit" class="button-delete" data-type="teamMember" data-name="{{ $participant->last_name }} {{ $participant->first_name }}">
						      		<i class="fa fa-trash-o" aria-hidden="true"></i> 
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
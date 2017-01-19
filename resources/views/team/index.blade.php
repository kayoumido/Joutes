@extends('layout')

@section('content')

	<div id="container">
		<a href="/"><img src="{{ asset("images/return-arrow.png") }}" alt="Retour en arrière" class="return"></a>

		<h1>Teams</h1>
		
		<input type="search" placeholder="Recherche" class="search form-control">

		<table>

			<thead>
				<tr>
					<th>Nom de l'équipe</th>
					<th>Options</th>
				</tr>
			</thead>

			<tbody class="searchIn">

			  	@foreach ($teams as $team)
					<tr>
				      <td class="name"> <a href="{{ route('teams.show', $team->id) }}" alt="Afficher la team"> {{ $team->name }} </a> </td>
				      <td> 
					      <a href="{{ route('teams.edit', $team->id) }}" alt="Modifier la team"> <i class="fa fa-pencil" aria-hidden="true"></i> </a>
					      {{ Form::open(array('url' => route('teams.destroy', $team->id), 'method' => 'delete')) }}
					      	<button type="submit" class="button-delete">
					      		<i class="fa fa-trash-o" aria-hidden="true"></i>
					      	</button>
					      {{ Form::close() }}
				      </td>
				    </tr>

				@endforeach
		    	
		  	</tbody>

		</table>

	</div>

@stop
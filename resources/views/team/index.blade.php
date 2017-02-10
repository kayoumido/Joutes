<!-- @author Dessauges Antoine -->
@extends('layout')

@section('content')

	<div class="container">

		<h1>Teams</h1>

		<input type="search" placeholder="Recherche" class="search form-control">

		<table class="table">

			<thead>
				<tr>
					<th>Nom de l'équipe</th>
					<th class="options">Actions</th>
				</tr>
			</thead>

			<tbody class="searchIn">

			  	@foreach ($teams as $team)
					<tr>
				      <th scope="row" class="name"> <a href="{{ route('teams.show', $team->id) }}" alt="Afficher la team"> {{ $team->name }} </a> </th>
				      <td>
					      <a href="{{ route('teams.edit', $team->id) }}" alt="Modifier la team"> <i class="fa fa-pencil fa-lg action" aria-hidden="true"></i> </a>
					      {{ Form::open(array('url' => route('teams.destroy', $team->id), 'method' => 'delete')) }}
					      	<button type="submit" class="button-delete">
					      		<i class="fa fa-lg fa-trash-o action" aria-hidden="true"></i>
					      	</button>
					      {{ Form::close() }}
				      </td>
				    </tr>

				@endforeach

		  	</tbody>

		</table>

	</div>

@stop

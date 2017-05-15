<!-- @author Dessauges Antoine -->
@extends('layout')

@section('content')

	<div class="container">

		<h1 id="titleTeam">Equipes</h1>

		<table id="teams-table" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">

			<thead>
				<tr>
					<th>Nom de l'équipe</th>
					<th>Actions</th>
				</tr>
			</thead>

			<tbody>

			  	@foreach ($teams as $team)
					<tr>
				      <td data-id="{{$team->id}}">{{ $team->name }}</td>
				      <td class="action">
					      <a href="{{ route('teams.edit', $team->id) }}" alt="Modifier la team"> <i class="fa fa-pencil fa-lg action" aria-hidden="true"></i> </a>
					      {{-- {{ Form::open(array('url' => route('teams.destroy', $team->id), 'method' => 'delete')) }}
					      	<button type="submit" class="button-delete">
					      		<i class="fa fa-lg fa-trash-o action" aria-hidden="true"></i>
					      	</button>
					      {{ Form::close() }} --}}
				      </td>
				    </tr>

				@endforeach

		  	</tbody>

		</table>

	</div>

@stop

<!-- @author Dessauges Antoine -->
@extends('layout')

@section('content')

	<div class="container">

		<h1>Participants</h1>

		<table id="participants-table" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">

			<thead>
				<tr>
					<th>Nom du participant</th>
				</tr>
			</thead>

			<tbody>

			  	@foreach ($participants as $participant)
					<tr>
				      <td> <a href="{{ route('participants.show', $participant->id) }}" alt="Afficher la participant"> {{ $participant->last_name }} {{ $participant->first_name }} </a> </td>
				    </tr>

				@endforeach

		  	</tbody>

		</table>

	</div>

@stop

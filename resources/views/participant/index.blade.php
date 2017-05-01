<!-- @author Dessauges Antoine -->
@extends('layout')

@section('content')

	<div class="container">

		<h1>Participants</h1>

		<table id="participants-table" class="table table-striped table-bordered table-hover translate" cellspacing="0" width="100%">

			<thead>
				<tr>
					<th>Nom du participant</th>
				</tr>
			</thead>

			<tbody>

			  	@foreach ($participants as $participant)
					<tr>
				      <td data-id="{{$participant->id}}">{{ $participant->last_name }} {{ $participant->first_name }}</td>
				    </tr>
				@endforeach

		  	</tbody>

		</table>

	</div>

@stop

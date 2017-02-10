<!-- @author Dessauges Antoine -->
@extends('layout')

@section('content')

	<div class="container">
		<a href="/"><img src="{{ asset("images/return-arrow.png") }}" alt="Retour en arrière" class="return"></a>

		<h1>Participants</h1>
		
		<input type="search" placeholder="Recherche" class="search form-control">

		<table class="table">

			<thead>
				<tr>
					<th>Nom du participant</th>
				</tr>
			</thead>

			<tbody class="searchIn">

			  	@foreach ($participants as $participant)
					<tr>
				      <th scope="row" class="name"> <a href="{{ route('participants.show', $participant->id) }}" alt="Afficher la participant"> {{ $participant->last_name }} {{ $participant->first_name }} </a> </th>
				    </tr>

				@endforeach
		    	
		  	</tbody>

		</table>

	</div>

@stop
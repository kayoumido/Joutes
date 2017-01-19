@extends('layout')

@section('content')

	<div id="container">
		<a href="{{ route('participants.index') }}"><img src="{{ asset("images/return-arrow.png") }}" alt="Retour en arrière" class="return"></a>

		<h1> {{ $participant->name }}</h1>
		<h2>Equipes du membre</h2>

		<table>

			<thead>
				<tr>
					<th>Nom de l'équipe</th>
					<th>Options</th>
				</tr>
			</thead>

			<tbody>

			  	
		    	
		  	</tbody>

		</table>



	</div>
	
@stop
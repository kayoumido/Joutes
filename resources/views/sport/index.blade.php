<!-- @author Dessaules Loïc -->

@extends('layout')

@section('content')
	<div class="container">
		<a href="/"><i class="fa fa-4x fa-arrow-circle-left return" aria-hidden="true"></i></a>
		<h1>Sports</h1>
		<table class="table">
			<thead>
				<tr>
					<th>Nom</th>
					<th>Description</th>
					<th class="options">Actions</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($sports as $sport)
					<tr>
						<th scope="row" class="name">{{$sport->name}}</th>
						<td class="description">{{$sport->description}}</td>
						<td class="action">
							<a href="{{route('sports.edit',$sport->id)}}" title="Éditer le sport" class="edit"><i class="fa fa-lg fa-pencil action" aria-hidden="true"></i></a>
							{{ Form::open(array('url' => route('sports.destroy', $sport->id), 'method' => 'delete')) }}
								<button type="button" class="button-delete" data-name="{{ $sport->name }}" data-type="sport">
				                    <i class="fa fa-lg fa-trash-o action" aria-hidden="true"></i>
				                </button>
							{{ Form::close() }}
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>

		<br>

		<a href="{{route('sports.create')}}" title="Créer un tournoi"><i class="fa fa-plus-circle fa-4x" aria-hidden="true"></i></a>

	</div>
@stop

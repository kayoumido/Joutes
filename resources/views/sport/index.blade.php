<!-- @author Dessaules Loïc -->

@extends('layout')

@section('content')
	<div id="container">
		<a href="/"><i class="fa fa-4x fa-arrow-circle-left return" aria-hidden="true"></i></a>
		<h1>Sports</h1>
		<table>
			<tr>
				<th>Nom</th>
				<th>Description</th>
				<th>Action</th>
			</tr>
			@foreach ($sports as $sport)
				<tr>
					<td class="name">{{$sport->name}}</td>
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
		</table>

		<br>

		<a href="{{route('sports.create')}}" title="Créer un sport"><input type="button" value="Nouveau", class="btn btn-primary"></a>

	</div>
@stop

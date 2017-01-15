@extends('layout')

@section('content')
	<div id="container">
		<h1>Liste des sports</h1>
		<table>
			<tr>
				<th>Noms</th>
				<th>Actions</th>
			</tr>
			@foreach ($sports as $sport)
				<tr>
					<td class="name">{{$sport->name}}</td>
					<td class="action">
						<a href="{{route('sports.edit',$sport->id)}}" title="Éditer le sport" class="edit"><i class="fa fa-pencil"></i></a>
						{{ Form::open(array('url' => route('sports.destroy', $sport->id), 'method' => 'delete')) }}
							<!-- <i class="fa fa-trash-o" aria-hidden="true"></i>-->
							<button type="submit" class="button-delete">
			                    <i class="fa fa-trash-o"></i>
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
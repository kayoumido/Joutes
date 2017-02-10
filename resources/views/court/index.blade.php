<!-- @author Dessaules Loïc -->

@extends('layout')

@section('content')
	<div class="container">
		<a href="/"><i class="fa fa-4x fa-arrow-circle-left return" aria-hidden="true"></i></a>
		<h1>Terrains</h1>
		<table class="table">
			<thead>
				<tr>
					<th>Nom</th>
					<th>Sport</th>
					<th class="options">Actions</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($courts as $court)
					<tr>
						<th scope="row" class="name" >{{$court->name}}</th>
						<td class="description" >{{$court->sport->name}}</td>
						<td class="action">
							<a href="{{route('courts.edit',$court->id)}}" title="Éditer le terrain" class="edit"><i class="fa fa-pencil fa-lg action" aria-hidden="true"></i></a>
							{{ Form::open(array('url' => route('courts.destroy', $court->id), 'method' => 'delete')) }}
								<button type="button" class="button-delete" data-name="{{ $court->name }}" data-type="court">
				                    <i class="fa fa-trash-o fa-lg action" aria-hidden="true"></i>
				                </button>
							{{ Form::close() }}
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>

		<br>
		
		<a href="{{route('courts.create')}}" title="Créer un tournoi"><i class="fa fa-plus-circle fa-4x" aria-hidden="true"></i></a>

	</div>
@stop

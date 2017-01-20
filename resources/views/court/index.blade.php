@extends('layout')

@section('content')
	<div id="container">
		<a href="/"><img src="{{ asset("images/return-arrow.png") }}" alt="Retour en arrière" class="return"></a>
		<h1>Terrains</h1>
		<table>
			<tr>
				<th>Nom</th>
				<th>Sport</th>
				<th>Action</th>
			</tr>
			@foreach ($courts as $court)
				<tr>
					<td class="name" style="width:40%">{{$court->name}}</td>
					<td class="description" style="width:40%">{{$court->sport->name}}</td>
					<td class="action">
						<a href="{{route('courts.edit',$court->id)}}" title="Éditer le terrain" class="edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
						{{ Form::open(array('url' => route('courts.destroy', $court->id), 'method' => 'delete')) }}
							<button type="button" class="button-delete" data-name="{{ $court->name }}" data-type="court">
			                    <i class="fa fa-trash-o" aria-hidden="true"></i>
			                </button>
						{{ Form::close() }}
					</td>
				</tr>
			@endforeach
		</table>

		<br>

		<a href="{{route('courts.create')}}" title="Créer un terrain"><input type="button" value="Nouveau", class="btn btn-primary"></a>

	</div>
@stop
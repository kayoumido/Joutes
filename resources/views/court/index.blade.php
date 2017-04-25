<!-- @author Dessaules Loïc -->

@extends('layout')

@section('content')
	<div class="container">
		<h1>Terrains</h1>
		<table id="courts-table" class="table table-striped table-bordered" cellspacing="0" width="100%">
			<thead>
				<tr>
					<th>Nom</th>
					<th>Sport</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($courts as $court)
					<tr>
						<td>{{$court->name}}</td>
						<td>{{$court->sport->name}}</td>
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

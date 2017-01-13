@extends('layout')

@section('content')
	<div id="container">
		<h1>Liste des sports</h1>
		<table>
			<tr>
				<th>Name</th>
				<th>Actions</th>
			</tr>
			@foreach ($sports as $sport)
				<tr>
					<td class="name">{{$sport->name}}</td>
					<td class="action">
						<a href="{{url('sports/'.$sport->id.'/edit')}}"><i class="fa fa-pencil"></i></a>
						<i class="fa fa-trash-o" aria-hidden="true"></i>
					</td>
				</tr>
			@endforeach
		</table>
	</div>
@stop
@extends('layout')

@section('content')

	<h1>Liste des sports</h1>
	<table>
		<tr>
			<th>Name</th>
			<th>Actions</th>
		</tr>
		@foreach ($sports as $sport)
			<tr>
				<td>{{$sport->name}}</td>
				<td>My action</td>
			</tr>
		@endforeach
	</table>
	
@stop
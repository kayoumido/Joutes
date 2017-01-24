@extends('layout')

@section('content')
	<div id="container">	
		<a href="{{ route('sports.index') }}"><img src="{{ asset("images/return-arrow.png") }}" alt="Retour en arrière" class="return"></a>
		<h1>Editer un sport</h1>

		@if ($errors->any() || isset($customError))
			<div class="alert alert-danger">
				@if ($errors->any())
		            @foreach ($errors->all() as $error)
		                {{ $error }}<br>        
		            @endforeach
		        @endif
		        @if (isset($customError))
		        	{{ $customError}}
		        @endif
	        </div>
        @endif

		{{ Form::open(array('url' => route('sports.update', $sport->id), 'method' => 'put',  'id' => 'formSport')) }}

			{{ Form::label('name', 'Nom : ') }}
			{{ Form::text('name', $sport->name) }}
			<br>
			{{ Form::label('description', 'Description : ') }}
			{{ Form::text('description', $sport->description) }}
			<br>
			<br>
			{{ Form::button('Enregistrer', array('class' => 'btn btn-success formSend')) }}

		{{ Form::close() }}	
		
	</div>
@stop
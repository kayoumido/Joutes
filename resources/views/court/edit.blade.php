@extends('layout')

@section('content')
	<div id="container">	
		<a href="{{ route('courts.index') }}"><img src="{{ asset("images/return-arrow.png") }}" alt="Retour en arrière" class="return"></a>
		<h1>Editer un terrain</h1>

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

		{{ Form::open(array('url' => route('courts.update', $court->id), 'method' => 'put')) }}

			{{ Form::label('name', 'Nom : ') }}
			{{ Form::text('name', $court->name) }}
			<br>
			{{ Form::label('Sport', 'Sport : ') }}
			{{ Form::select('sport', $dropdownList, $court->sport->id, ['placeholder' => 'Sélectionner', 'class' => 'courtHasSport']) }}
			<br>
			<br>
			{{ Form::submit('Enregistrer', array('class' => 'btn btn-success')) }}

		{{ Form::close() }}	
		
	</div>
@stop
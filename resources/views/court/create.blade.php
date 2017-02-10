<!-- @author Dessaules Loïc -->

@extends('layout')

@section('content')
	<div id="container">
		<a href="{{ route('courts.index') }}"><i class="fa fa-4x fa-arrow-circle-left return" aria-hidden="true"></i></a>	
		<h1>Créer un terrain</h1>

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

		{{ Form::open(array('url' => route('courts.store'), 'method' => 'post', 'id' => 'formCourt')) }}

			{{ Form::label('name', 'Nom : ') }}
			{{ Form::text('name', null) }}
			<br>
			{{ Form::label('Sport', 'Sport : ') }}
			{{ Form::select('sport', $dropdownList, null, ['placeholder' => 'Sélectionner', 'class' => 'allSameStyle', 'id' => 'sport']) }}
			<br>
			<br>
			{{ Form::button('Créer', array('class' => 'btn btn-success formSend')) }}

		{{ Form::close() }}

		<br>


	</div>
@stop

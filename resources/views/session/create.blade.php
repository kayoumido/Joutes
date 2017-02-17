<!-- @author Dessaules Loïc -->

@extends('layout')

@section('content')
	<div class="container">
        <div class="row">
            <div class="col-md-12 text-center">

	            @if(isset($error))
	            	<div class="alert alert-danger">
	            		{{ $error["message"] }}
	            	</div>
	            @endif

				{{ Form::open(array('url' => route('admin.store'), 'method' => 'post', 'id' => 'login-form')) }}
					{{ Form::label('username', 'Nom d\'utilisateur : ') }}
					@if(isset($error))
						{{ Form::text('username', $error['username'], array('required' => '')) }}
					@else
						{{ Form::text('username', null, array('required' => '')) }}
					@endif
					<br>
					{{ Form::label('password', 'Mot de passe : ') }}
					{{ Form::password('password', null) }}
					<br>
					<br>
					{{ Form::submit('Connexion', array('class' => 'btn btn-success btn-login-form')) }}
				{{ Form::close() }}
			</div>
		</div>
	</div>
@stop
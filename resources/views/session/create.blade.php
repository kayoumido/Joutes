<!-- @author Dessaules Loïc -->

@extends('layout')

@section('content')
	<div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
				{{ Form::open(array('url' => route('admin.store'), 'method' => 'post', 'id' => 'login-form')) }}
					{{ Form::label('username', 'Nom d\'utilisateur : ') }}
					{{ Form::text('username', null, array('required' => '')) }}
					<br>
					{{ Form::label('password', 'Mot de passe : ') }}
					{{ Form::password('password', null) }}
					<br>
					<br>
					{{ Form::submit('Connexion', array('class' => 'btn btn-success')) }}
				{{ Form::close() }}
			</div>
		</div>
	</div>
@stop
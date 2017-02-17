{{ Form::open(array('url' => route('login.store'), 'method' => 'post')) }}

	{{ Form::label('username', 'Username : ') }}
	{{ Form::text('username', null) }}
	<br>
	{{ Form::label('password', 'Password : ') }}
	{{ Form::password('password', null) }}
	<br>
	<br>
	{{ Form::submit('Connexion') }}

{{ Form::close() }}

@if ($connected)
	<p>You are connected</p>
	{{ Form::open(array('url' => route('login.destroy', 0), 'method' => 'delete')) }}
		{{ Form::submit('Déconnexion') }}
	{{ Form::close() }}
@else
	<p>You aren't connected</p>
@endif
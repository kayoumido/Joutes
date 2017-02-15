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
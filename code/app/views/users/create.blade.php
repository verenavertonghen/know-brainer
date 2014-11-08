<h1>Registreren</h1>

		{{ Form::open(['route' => 'users.store']) }}
		<div>
			{{ Form::label('username', 'Gebruikersnaam ') }}<br>
			{{ Form::text('username') }}
			{{ $errors->first('username', '<span class="error">:message</span>') }}
		</div>

		<div>
			{{ Form::label('password', 'Wachtwoord ') }}<br>
			{{ Form::password('password') }}
			{{ $errors->first('password', '<span class="error">:message</span>') }}
		</div>

		<div>
			{{ Form::label('email', 'Email-adres ') }}<br>
			{{ Form::email('email') }}
			{{ $errors->first('email', '<span class="error">:message</span>') }}
		</div>

		<div>
		<br>{{ Form::submit('Registreren', array('class' => 'btn btn-primary')) }}
		</div>

		{{ Form::close() }}
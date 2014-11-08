{{ Form::open(['route' => 'sessions.store']) }}
		<div>
			{{ Form::label('email', 'Email ')}}<br>
			{{ Form::email('email') }}
		</div>

		<div>
			{{ Form::label('password', 'Password ')}}<br>
			{{ Form::password('password') }}
		</div>

		<div>
			<br>{{ Form::submit('Log in', array('class' => 'btn btn-primary')) }}
			<br>{{Form::checkbox('remember_me', 'yes')}}Blijf ingelogd
		</div>
		{{ Form::close() }}

		<div id="fb-login">
			<a class="fb-btn" href="login/fb">Log in using Facebook</a>
		</div>
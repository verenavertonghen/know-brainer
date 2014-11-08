@extends('layouts.default')

@section('content')

<?php $error = false; ?>
<div class="container">
    <div class="login">
    	<div class="login-screen">
        	<div class="login-icon">
        	<img src="img/brain.png">
            	<h4>Welkom bij <small>Know-brainer</small></h4>
          	</div>
			<div class="login-form">
			<?php if($errors->any()) {
				$error = true;
			}?>
				{{ Form::open(['route' => 'sessions.store']) }}

					<div class="form-group {{ ($error) ? 'has-error' : '' }}">
						{{ Form::email('email', '', array('id' => 'email', 'class' => 'form-control login-field', 'placeholder' => 'Voer uw email in')) }}
						{{ Form::label('email', ' ', array('class' => 'login-field-icon fui-user'))}}
					</div>

					<div class="form-group {{ ($error) ? 'has-error' : '' }}">
						{{ Form::password('password', array('id' => 'password', 'class' => 'form-control login-field', 'placeholder' => 'Wachtwoord')) }}
						{{ Form::label('password', ' ', array('class' => 'login-field-icon fui-lock'))}}
					</div>


					<label class="checkbox" for='remember_me'>
						{{Form::checkbox('remember_me', 'yes', false, array('data-toggle' => 'checkbox', 'id' => 'remember_me'))}}
						Blijf ingelogd
					</label>

					{{ Form::submit('Log in', array('class' => 'btn btn-primary btn-lg btn-block')) }}
			
				{{ Form::close() }}

		<br>
		<div id="fb-login">
			<a class="fb-btn btn btn-block btn-lg btn-info" href="login/fb">Login met Facebook</a>
		</div>

        </div>
      </div>
    </div>
</div>
@stop

@extends('layouts.default')
@section('container')
@section('title', 'Registreer')
<h1>Registreren</h1>
<?php $error = false; ?>
 <?php if($errors->any()) {
        		$error = true;
        	}?>


    	<div class="login-screen">

        <div class="login-form">
		{{ Form::open(['route' => 'users.store']) }}

		<div class="form-group {{ ($error) ? 'has-error' : '' }}">
			{{ Form::text('username','', array('class' => 'form-control login-field','placeholder' => 'Voer een gebruikersnaam in')) }}
            {{ Form::label('username', ' ', array('class' => 'login-field-icon fui-user'))}}
            {{ $errors->first('username', '<span class="error">:message</span>') }}

		</div>

		<div class="form-group {{ ($error) ? 'has-error' : '' }}">
			{{ Form::email('email','', array('class' => 'form-control login-field','placeholder' => 'Voer uw e-mail-adres in')) }}
            {{ Form::label('email', ' ', array('class' => 'login-field-icon fui-mail'))}}
            {{ $errors->first('email', '<span class="error">:message</span>') }}
		</div>

		<div class="form-group {{ ($error) ? 'has-error' : '' }}">
                {{ Form::password('password',array('class' => 'form-control login-field','placeholder' =>'Wachtwoord')) }}
                {{ Form::label('password', ' ', array('class' => 'login-field-icon fui-lock' ))}}
                {{ $errors->first('password', '<span class="error">:message</span>') }}
            </div>

		<div>
		<br>{{ Form::submit('Registreren', array('class' => 'btn btn-primary')) }}
		</div>

		</div>
		</div>
		<br>

		{{ Form::close() }}

@stop
@extends('layouts.default')

@section('container')

<?php $error = false; ?>

    	<div class="login-screen">

        <div class="login-form">
            <?php if($errors->any()) {
        		$error = true;
        	}?>
            {{ Form::open(['route' => 'sessions.store']) }}
            <div class="form-group {{ ($error) ? 'has-error' : '' }}">
                {{ Form::email('email','', array('class' => 'form-control login-field','placeholder' =>'Voer uw e-mail-adres in')) }}
            	{{ Form::label('email', ' ', array('class' => 'login-field-icon fui-user'))}}
            </div>


            <div class="form-group {{ ($error) ? 'has-error' : '' }}">
                {{ Form::password('password',array('class' => 'form-control login-field','placeholder' =>'Wachtwoord')) }}
                {{ Form::label('password', ' ', array('class' => 'login-field-icon fui-lock' ))}}
            </div>

            <label class="checkbox" for="remember_me">
                {{Form::checkbox('remember_me', 'yes', null, array('data-toggle' => 'checkbox', 'id' => 'remember_me'))}}
                <small class="text-muted">Blijf ingelogd</small>
            </label>

            <div class="form-group">
                {{ Form::submit('Log in', array('class' => 'btn btn-primary btn-lg btn-block')) }}
            </div>

            <div class="form-group">
                <a class="login-link" href="#">Wachtwoord vergeten?</a>
            </div>

            {{ Form::close() }}

            <div class="separator">
            	<p> of </p>
            </div>

            <div class="form-group">
                <div id="fb-login">
                    <a class="fb-btn btn btn-info btn-lg btn-block" href="login/fb">Log in met Facebook</a>
                </div>
            </div>
        </div>

    </div>

<br/>
@stop

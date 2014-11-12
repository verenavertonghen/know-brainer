@extends('layouts.default')
@section('title', 'Log in')
@section('container')

<?php $error = false; ?>
<h1>Log in</h1>
    	<div class="login-screen">

        <div class="login-form">
            <?php if($errors->any()) {
        		$error = true;
        	}?>

        @if(isset($login_error))
          <div class="msg-error">{{ $login_error }}</div>          
        @endif

            {{ Form::open(['route' => 'sessions.store']) }}
            <div class="form-group {{ ($error) ? 'has-error' : '' }}">
                {{ Form::text('username','', array('class' => 'form-control login-field','placeholder' =>'Voer uw gebruikersnaam in')) }}
            	{{ Form::label('username', ' ', array('class' => 'login-field-icon fui-user'))}}
                {{ $errors->first('username', '<span class="error">:message</span>') }}
            </div>


            <div class="form-group {{ ($error) ? 'has-error' : '' }}">
                {{ Form::password('password',array('class' => 'form-control login-field','placeholder' =>'Wachtwoord')) }}
                {{ Form::label('password', ' ', array('class' => 'login-field-icon fui-lock' ))}}
                {{ $errors->first('password', '<span class="error">:message</span>') }}
            </div>

            <label class="checkbox" for="remember_me">
                {{Form::checkbox('remember_me', 'yes', null, array('data-toggle' => 'checkbox', 'id' => 'remember_me'))}}
                <small class="text-muted">Blijf ingelogd</small>
            </label>

            <div class="form-group">
                {{ Form::submit('Log in', array('class' => 'btn btn-primary btn-lg btn-block')) }}
            </div>

            <div class="form-group">
                <a class="login-link" href="/wachtwoord/reset">Wachtwoord vergeten?</a>
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

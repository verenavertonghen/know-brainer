@extends('layouts.default')
@section('title', 'Wachtwoord wijzigen')

@section('container')

<h1>Wachtwoord wijzigen</h1>

    	<div class="login-screen">

        <div class="login-form">

		@if (Session::has('error'))
  		{{ trans(Session::get('reason')) }}
		@endif
 
		{{ Form::open(array('action' => 'RemindersController@postReset', 'method' => 'POST')) }}
 
		<div class="form-group {{ (Session::has('error')) ? 'has-error' : '' }}">
			{{ Form::email('email','', array('class' => 'form-control login-field','placeholder' => 'Voer uw e-mail-adres in')) }}
            {{ Form::label('email', ' ', array('class' => 'login-field-icon fui-mail'))}}
            {{ $errors->first('email', '<span class="error">:message</span>') }}
		</div>
 
  		<div class="form-group {{ (Session::has('error')) ? 'has-error' : '' }}">
                {{ Form::password('password',array('class' => 'form-control login-field','placeholder' =>'Uw nieuw wachtwoord')) }}
                {{ Form::label('password', ' ', array('class' => 'login-field-icon fui-lock' ))}}
        </div>
        <div class="form-group {{ (Session::has('error')) ? 'has-error' : '' }}">
                {{ Form::password('password_confirmation',array('class' => 'form-control login-field','placeholder' =>'Bevestig uw nieuw wachtwoord')) }}
                {{ Form::label('password_confirmation', ' ', array('class' => 'login-field-icon fui-lock' ))}}
            </div>

  		{{ Form::hidden('token', $token) }}
 
		 
		<p>{{ Form::submit('Verzend', array('class' => 'btn btn-primary')) }}</p>
		 
		{{ Form::close() }}

		</div>
	</div>
<br>
	@stop
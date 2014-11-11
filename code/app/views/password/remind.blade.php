@extends('layouts.default')
@section('title', 'Wachtwoord vergeten')

@section('container')

<h1>Wachtwoord vergeten</h1>

    	<div class="login-screen">

        <div class="login-form">

		@if (Session::has('error'))
		  Hoi{{ trans(Session::get('reason')) }}
		@elseif (Session::has('success'))
		  An email with the password reset has been sent.
		@endif
		 
		{{ Form::open(array('action' => 'RemindersController@postRemind', 'method' => 'POST')) }}
		 
		  <div class="form-group {{ (Session::has('error')) ? 'has-error' : '' }}">
			{{ Form::email('email','', array('class' => 'form-control login-field','placeholder' => 'Voer uw e-mail-adres in')) }}
            {{ Form::label('email', ' ', array('class' => 'login-field-icon fui-lock'))}}
            {{ $errors->first('email', '<span class="error">:message</span>') }}
		</div>
		 
		  <p>{{ Form::submit('Verzend', array('class' => 'btn btn-primary')) }}</p>
		 
		{{ Form::close() }}

		</div>
	</div>
<br>
	@stop
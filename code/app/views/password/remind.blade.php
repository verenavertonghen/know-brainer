@extends('layouts.default')
@section('title', 'Wachtwoord vergeten')

@section('container')

<h1>Wachtwoord vergeten</h1>

    	<div class="login-screen">

        <div class="login-form">

	@if(!Session::has('success'))
		@if (Session::has('error') || $errors->any())
		  <div class="msg-error">{{ (Session::get('error')) }}</div>		  
		@endif
		 
		{{ Form::open(array('action' => 'RemindersController@postRemind', 'method' => 'POST')) }}
		 
		  <div class="form-group {{ (Session::has('error')) ? 'has-error' : '' }}">
			{{ Form::email('email','', array('class' => 'form-control login-field','placeholder' => 'Voer uw e-mail-adres in')) }}
            {{ Form::label('email', ' ', array('class' => 'login-field-icon fui-lock'))}}
            {{ $errors->first('email', '<span class="error">:message</span>') }}
		</div>
		 
		  <p>{{ Form::submit('Verzend', array('class' => 'btn btn-primary')) }}</p>
		 
		{{ Form::close() }}
	@else 
		<div class="msg-succes">
			<p>Mail verzonden.</p>
			<a href="/"><i>Keer terug naar de homepage</i></a></div>
	@endif
		</div>
	</div>
@stop
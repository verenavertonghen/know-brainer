@extends('layouts.default')

@section('search')
    <!--Zoekbalk-->
    <form class="navbar-form navbar-right" action="#" role="search">
      <div class="form-group">
        <div class="input-group">
          <input class="form-control" id="navbarInput-01" type="search" placeholder="Zoeken">
          <span class="input-group-btn">
            <button type="submit" class="btn"><span class="fui-search"></span></button>
          </span>
        </div>
      </div>
    </form>
@stop


@section('container')

<?php $error = false; ?>
<!--
<div class="login">
    	<div class="login-screen">-->
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
                {{ Form::label('email', '', array('class' => ''))}}
                {{ Form::email('email','', array('class' => 'form-control login-field','placeholder' =>'Voer uw e-mail in')) }}
            </div>

            <!-- login-field-icon fui-lock -->
            <div class="form-group {{ ($error) ? 'has-error' : '' }}">
                {{ Form::label('password', '', array('class' => ''))}}
                {{ Form::password('password',array('class' => 'form-control login-field','placeholder' =>'Wachtwoord')) }}
            </div>

            <div class="form-group">
                {{Form::checkbox('remember_me', 'yes', array('class' => 'checkbox'))}}<small class="text-muted">Blijf ingelogd</small>
            </div>

            <div class="form-group">
                {{ Form::submit('Log in', array('class' => 'btn btn-primary btn-lg btn-block')) }}
            </div>

            <div class="form-group">
                <a class="login-link" href="#">Wachtwoord vergeten?</a>
            </div>

            {{ Form::close() }}

            <div class="form-group">
                <div id="fb-login">
                    <a class="fb-btn btn btn-inverse btn-lg btn-block" href="login/fb">Log in met Facebook</a>
                </div>
            </div>
        </div>
<!--
    </div>
</div>-->
<br/>
@stop

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
<!--
<div class="login">
    <div class="login-screen">
      <div class="login-icon">
        <h4>Welkom bij <small>Know-brainer</small></h4>
      </div>

        <div class="login-form">
        <div class="form-group">
          <input type="text" class="form-control login-field" value="" placeholder="Enter your name" id="login-name" />
          <label class="login-field-icon fui-user" for="login-name"></label>
        </div>

        <div class="form-group">
          <input type="password" class="form-control login-field" value="" placeholder="Password" id="login-pass" />
          <label class="login-field-icon fui-lock" for="login-pass"></label>
        </div>

        <a class="btn btn-primary btn-lg btn-block" href="#">Log in</a>
        <a class="login-link" href="#">Wachtwoord vergeten?</a>
      </div>
</div>
-->
<!--
<div class="login">
    <div class="login-screen">-->
        <div class="login-icon">
            <h4>Welkom bij <small>Know-brainer</small></h4>
        </div>

        <div class="login-form">
            {{ Form::open(['route' => 'sessions.store']) }}
            <div class="form-group">
                {{ Form::label('email', '', array('class' => ''))}}
                {{ Form::email('email','', array('class' => 'form-control login-field','placeholder' =>'Enter your name')) }}
            </div>

            <!-- login-field-icon fui-lock -->
            <div class="form-group">
                {{ Form::label('password', '', array('class' => ''))}}
                {{ Form::password('password',array('class' => 'form-control login-field','placeholder' =>'Password')) }}
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
                    <a class="fb-btn btn btn-inverse btn-lg btn-block" href="login/fb">Log in using Facebook</a>
                </div>
            </div>
        </div>
        <!--
    </div>
</div>-->
<br/>

@stop


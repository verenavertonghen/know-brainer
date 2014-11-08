@extends('layouts.default')

@section('nav')
    <a class="navbar-brand" href="#">Know-brainer</a>
        </div>
        <div class="collapse navbar-collapse" id="navbar-collapse-01">
          <ul class="nav navbar-nav navbar-left">
            <li><a href="#">Over ons</a></li>
            <li><a href="#">Opstellen</a></li>
            <li><a href="#">Overzicht</a></li>
            <li><a href="#">Inloggen</a></li>
           </ul>
        </div><!-- /.navbar-collapse -->
      <!--</div>-->
    </nav><!-- /navbar -->
@stop

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
@stop
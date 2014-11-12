@extends('layouts.default')
@section('container')
@section('title', 'Bewerk')
<div class="container">
{{ Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'PUT', 'files' => TRUE]) }}


    <img src="{{ $user->avatar }}" class="img-circle" height="300px">
    <br/>
    <div>
    {{ Form::file('image',array('class' => 'btn btn-primary file-btn')) }}
    </div>

	<div class="form-group">
	{{ Form::label('username', 'Gebruikersnaam') }}
    {{ Form::text('username', null, array('class' => 'form-control input-small','placeholder' =>'Verena Vertonghen')) }}
	</div>
	<div class="form-group">
	{{ Form::label('email', 'Email') }}
    {{ Form::email('email', null, array('class' => 'form-control','placeholder' =>'verena.vertonghen@gmail.com')) }}
    </div>
    <div class="form-group">
	{{ Form::label('over', 'Over') }}
    {{ Form::textarea('about', null, array('class' => 'form-control','placeholder' =>'Hallo, ik ben ...')) }}
    </div>
    <div class="form-group">
    {{ Form::label('facebook', 'Vul aan: www.facebook.com/') }}
    {{ Form::text('facebook', null, array('class' => 'form-control','placeholder' =>'verenavertonghen')) }}
	</div>
	<div class="form-group">
	{{ Form::label('twitter', 'Vul aan: www.twitter.com/') }}
    {{ Form::text('twitter', null, array('class' => 'form-control','placeholder' =>'vvertonghen')) }}
    </div>
    <div class="form-group">
    {{ Form::label('youtube', 'Vul aan: www.youtube.com/') }}
    {{ Form::text('youtube', null, array('class' => 'form-control','placeholder' =>'vvertonghen')) }}
    </div>
    <div class="form-group">
    {{ Form::label('website', 'Vul je domeinnaam in:') }}
    {{ Form::text('website', null, array('class' => 'form-control','placeholder' =>'verenavertonghen.be')) }}
    </div>


    {{ Form::submit('Opslaan', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}
</div>
<br/>
@stop
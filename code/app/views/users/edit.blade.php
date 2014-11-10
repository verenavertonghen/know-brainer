@extends('layouts.default')
@section('container')
@section('title', 'Bewerk')
<div class="container">
{{ Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'PUT', 'files' => TRUE]) }}


    <img src="{{ $user->avatar }}">
    {{ Form::file('image') }}    

	<div class="form-group">
	{{ Form::label('username', 'Gebruikersnaam') }}
    {{ Form::text('username', null, array('class' => 'form-control input-small')) }}
	</div>
	<div class="form-group">
	{{ Form::label('email', 'Email') }}
    {{ Form::email('email', null, array('class' => 'form-control')) }}
    </div>
    <div class="form-group">
	{{ Form::label('over', 'Over') }}
    {{ Form::textarea('about', null, array('class' => 'form-control')) }}
    </div>
    <div class="form-group">
    {{ Form::label('facebook', 'Facebook') }}
    {{ Form::text('facebook', null, array('class' => 'form-control')) }}
	</div>
	<div class="form-group">
	{{ Form::label('twitter', 'Twitter') }}
    {{ Form::text('twitter', null, array('class' => 'form-control')) }}
    </div>
    <div class="form-group">
    {{ Form::label('youtube', 'Youtube') }}
    {{ Form::text('youtube', null, array('class' => 'form-control')) }}
    </div>
    <div class="form-group">
    {{ Form::label('website', 'Website') }}
    {{ Form::text('website', null, array('class' => 'form-control')) }}
    </div>

    {{ Form::submit('Opslaan', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}
</div>
@stop
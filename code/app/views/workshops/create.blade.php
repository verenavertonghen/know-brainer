@extends('layouts.default')

@section('container')

<?php $error = false; ?>

    	<div class="login-screen">

        <div class="login-form">
            <?php if($errors->any()) {
        		$error = true;
        	}?>
            {{ Form::open(['route' => 'workshop.store']) }}
            <div class="form-group {{ ($error) ? 'has-error' : '' }}">
                {{ Form::text('title','', array('class' => 'form-control login-field','placeholder' =>'Voer een titel in')) }}
            	{{ Form::label('title', ' ', array('class' => ''))}}
            </div>

            <div class="form-group {{ ($error) ? 'has-error' : '' }}">
                {{ Form::text('category','',array('class' => 'form-control login-field','placeholder' =>'Kies een categorie')) }}
                {{ Form::label('category', ' ', array('class' => '' ))}}
            </div>

            <div class="form-group {{ ($error) ? 'has-error' : '' }}">
                {{ Form::textarea('description','',array('class' => 'form-control login-field','placeholder' =>'Voeg een beschrijving toe')) }}
                {{ Form::label('description', ' ', array('class' => '' ))}}
            </div>

            <div class="form-group {{ ($error) ? 'has-error' : '' }}">
                {{ Form::text('location','',array('class' => 'form-control login-field','placeholder' =>'Geef een locatie op of kies er een')) }}
                {{ Form::label('location', ' ', array('class' => '' ))}}
            </div>

            <div class="form-group {{ ($error) ? 'has-error' : '' }}">
                {{ Form::text('start_date','',array('class' => 'form-control login-field','placeholder' =>'Kies een start tijdstip')) }}
                {{ Form::label('start_date', ' ', array('class' => '' ))}}
            </div>

            <div class="form-group {{ ($error) ? 'has-error' : '' }}">
                {{ Form::text('end_date','',array('class' => 'form-control login-field','placeholder' =>'Kies een eind tijdstip')) }}
                {{ Form::label('end_date', ' ', array('class' => '' ))}}
            </div>

            <div class="form-group {{ ($error) ? 'has-error' : '' }}">
                {{ Form::number('subscribers_amount','',array('class' => 'form-control login-field','placeholder' =>'Geeft het max. aantal deelnemers')) }}
                {{ Form::label('subscribers_amount', ' ', array('class' => '' ))}}
            </div>

            <div class="form-group">
                {{ Form::submit('Maak workshop', array('class' => 'btn btn-primary btn-lg btn-block')) }}
            </div>

            {{ Form::close() }}
        </div>
    </div>
<br/>
@stop

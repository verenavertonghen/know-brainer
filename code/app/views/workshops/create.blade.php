@extends('layouts.default')
@section('title', 'Workshop aanmaken')
@section('container')
<h1 class="text-primary">Maak een workshop</h1>

@if(Auth::check())
<?php $error = false; ?>

    <!--<div class="login-screen">-->
        <div class="login-form">
            <?php if($errors->any()) {
                $error = true;
            }?>
            {{ Form::open(['route' => 'workshop.store', 'files' => TRUE]) }}

                <p>Komt te weten hoe </p>
                <div class="form-group {{ ($error) ? 'has-error' : '' }}">
                    {{ Form::text('title','', array('class' => 'form-control login-field','placeholder' =>'Voer een titel in')) }}
                    {{ Form::label('title', ' ', array('class' => 'login-field-icon fui-question-circle'))}}
                    {{ $errors->first('title', '<span class="error">:message</span>')}}
                </div>

                <p>Categorie</p>
                <div class="form-group {{ ($error) ? 'has-error' : '' }}">
                    {{ Form::text('category','',array('class' => 'form-control login-field','placeholder' =>'Talen. Code. Wiskunde.')) }}
                    {{ Form::label('category', ' ', array('class' => 'login-field-icon fui-tag' ))}}
                    {{ $errors->first('category', '<span class="error">:message</span>')}}
                </div>

                <p>Beschrijving</p>
                <div class="form-group {{ ($error) ? 'has-error' : '' }}">
                    {{ Form::textarea('description','',array('class' => 'form-control login-field','placeholder' =>'Ik leer je hoe je ...')) }}
                    {{ Form::label('description', ' ', array('class' => 'login-field-icon fui-new' ))}}
                    {{ $errors->first('description', '<span class="error">:message</span>')}}
                </div>

                <p>Waar?</p>
                <div class="form-group {{ ($error) ? 'has-error' : '' }}">
                    {{ Form::text('location','',array('class' => 'form-control login-field','placeholder' =>'Cuperus, Sint-Katelijnevest 51, 2000 Antwerpen')) }}
                    {{ Form::label('location', ' ', array('class' => 'login-field-icon fui-location' ))}}
                    {{ $errors->first('location', '<span class="error">:message</span>')}}
                </div>

                <p>Wanneer?</p>
                <div class="form-group {{ ($error) ? 'has-error' : '' }}">
                    {{ Form::text('date','',array('class' => 'form-control login-field','placeholder' =>'15/02/2015')) }}
                    {{ Form::label('date', ' ', array('class' => 'login-field-icon fui-calendar' ))}}
                    {{ $errors->first('date', '<span class="error">:message</span>')}}
                </div>

                <p>Om hoe laat?</p>
                <div class="form-group {{ ($error) ? 'has-error' : '' }}">
                    {{ Form::text('time','',array('class' => 'form-control login-field','placeholder' =>'15:30')) }}
                    {{ Form::label('time', ' ', array('class' => 'login-field-icon fui-time' ))}}
                    {{ $errors->first('time', '<span class="error">:message</span>')}}
                </div>

                <p>Duur in minuten?</p>
                <div class="form-group {{ ($error) ? 'has-error' : '' }}">
                    {{ Form::select('6', array('15' => '15min', '30' => '30min', '45' => '45min','60' => '60min', '75' => '75min'), '60min',array('class'=> 'dropdown-menu dropdown-menu-inverse')) }}
                    {{ Form::text('duration','',array('class' => 'form-control login-field','placeholder' =>'60')) }}
                    {{ Form::label('duration', ' ', array('class' => 'login-field-icon fui-triangle-down' ))}}
                    {{ $errors->first('duration', '<span class="error">:message</span>')}}
                </div>

                <p>Benodigdheden</p>
                <div class="form-group {{ ($error) ? 'has-error' : '' }}">
                    {{ Form::text('requirements','',array('class' => 'form-control login-field','placeholder' =>'Pen.')) }}
                    {{ Form::label('requirements', ' ', array('class' => 'login-field-icon fui-plus-circle' ))}}
                    {{ $errors->first('requirements', '<span class="error">:message</span>')}}
                </div>

                <p>Voorkennis?</p>
                <div class="form-group {{ ($error) ? 'has-error' : '' }}">
                    {{ Form::text('foreknowledge','',array('class' => 'form-control login-field','placeholder' =>'Basis voor frans.')) }}
                    {{ Form::label('foreknowledge', ' ', array('class' => 'login-field-icon fui-info-circle' ))}}
                    {{ $errors->first('foreknowledge', '<span class="error">:message</span>')}}
                </div>

                <p>Maximum aantal deelnemers?</p>
                <div class="form-group {{ ($error) ? 'has-error' : '' }}">
                    {{ Form::number('subscribers_amount','',array('class' => 'form-control login-field','placeholder' =>'5')) }}
                    {{ Form::label('subscribers_amount', ' ', array('class' => '' ))}}
                    {{ $errors->first('subscribers_amount', '<span class="error">:message</span>')}}
                </div>

                <p>Voeg eventueel een afbeelding toe</p>
                <div class="form-group {{ ($error) ? 'has-error' : '' }}">
                    {{ Form::file('image', '', array('form-control login-field')) }} 
                </div>

                <div class="form-group">
                    {{ Form::submit('Maak workshop', array('class' => 'btn btn-primary btn-lg btn-block')) }}
                </div>

            {{ Form::close() }}
        </div>
@else 
    <div>
        <p><a href="/login">Log in</a> of <a href="/registreer">maak een account aan</a> om een workshop aan te maken.</p>
        </div>


@endif
    <!--</div>-->
    <br/>
@stop

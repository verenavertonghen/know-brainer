@extends('layouts.default')

@section('container')
<h1 class="text-primary">Maak een workshop</h1>

<?php $error = false; ?>

    <!--<div class="login-screen">-->
        <div class="login-form">
            <?php if($errors->any()) {
                $error = true;
            }?>
            {{ Form::open(['route' => 'workshop.store']) }}

                <div class="form-group {{ ($error) ? 'has-error' : '' }}">
                    Komt te weten hoe {{ Form::text('title','', array('class' => 'form-control login-field','placeholder' =>'Voer een titel in')) }}
                    {{ Form::label('title', ' ', array('class' => ''))}}
                    {{ $errors->first('title', '<span class="error">:message</span>')}}
                </div>

                <div class="form-group {{ ($error) ? 'has-error' : '' }}">
                    {{ Form::text('category','',array('class' => 'form-control login-field','placeholder' =>'Kies een categorie')) }}
                    {{ Form::label('category', ' ', array('class' => '' ))}}
                    {{ $errors->first('category', '<span class="error">:message</span>')}}
                </div>

                <div class="form-group {{ ($error) ? 'has-error' : '' }}">
                    {{ Form::textarea('description','',array('class' => 'form-control login-field','placeholder' =>'Voeg een beschrijving toe')) }}
                    {{ Form::label('description', ' ', array('class' => '' ))}}
                    {{ $errors->first('description', '<span class="error">:message</span>')}}
                </div>

                <div class="form-group {{ ($error) ? 'has-error' : '' }}">
                    {{ Form::text('location','',array('class' => 'form-control login-field','placeholder' =>'Geef een locatie op of kies er een')) }}
                    {{ Form::label('location', ' ', array('class' => '' ))}}
                    {{ $errors->first('location', '<span class="error">:message</span>')}}
                </div>

                <div class="form-group {{ ($error) ? 'has-error' : '' }}">
                    {{ Form::text('date','',array('class' => 'form-control login-field','placeholder' =>'Op welke datum?')) }}
                    {{ Form::label('date', ' ', array('class' => '' ))}}
                    {{ $errors->first('date', '<span class="error">:message</span>')}}
                </div>

                <div class="form-group {{ ($error) ? 'has-error' : '' }}">
                    {{ Form::text('time','',array('class' => 'form-control login-field','placeholder' =>'Om hoe laat?')) }}
                    {{ Form::label('time', ' ', array('class' => '' ))}}
                    {{ $errors->first('time', '<span class="error">:message</span>')}}
                </div>

                <div class="form-group {{ ($error) ? 'has-error' : '' }}">
                    {{ Form::text('duration','',array('class' => 'form-control login-field','placeholder' =>'Duur?')) }}
                    {{ Form::label('duration', ' ', array('class' => '' ))}}
                    {{ $errors->first('duration', '<span class="error">:message</span>')}}
                </div>

                <div class="form-group {{ ($error) ? 'has-error' : '' }}">
                    {{ Form::text('requirements','',array('class' => 'form-control login-field','placeholder' =>'Benodigheden?')) }}
                    {{ Form::label('requirements', ' ', array('class' => '' ))}}
                    {{ $errors->first('requirements', '<span class="error">:message</span>')}}
                </div>

                <div class="form-group {{ ($error) ? 'has-error' : '' }}">
                    {{ Form::text('foreknowledge','',array('class' => 'form-control login-field','placeholder' =>'Is er voorkennis nodig?')) }}
                    {{ Form::label('foreknowledge', ' ', array('class' => '' ))}}
                    {{ $errors->first('foreknowledge', '<span class="error">:message</span>')}}
                </div>

                <div class="form-group {{ ($error) ? 'has-error' : '' }}">
                    {{ Form::number('subscribers_amount','',array('class' => 'form-control login-field','placeholder' =>'Geeft het max. aantal deelnemers')) }}
                    {{ Form::label('subscribers_amount', ' ', array('class' => '' ))}}
                    {{ $errors->first('subscribers_amount', '<span class="error">:message</span>')}}
                </div>

                <div class="form-group {{ ($error) ? 'has-error' : '' }}">
                    {{ Form::text('picture','',array('class' => 'form-control login-field','placeholder' =>'Voeg eventueel een afbeelding toe')) }}
                    {{ Form::label('picture', ' ', array('class' => '' ))}}
                    {{ $errors->first('picture', '<span class="error">:message</span>')}}
                </div>

                <div class="form-group">
                    {{ Form::submit('Maak workshop', array('class' => 'btn btn-primary btn-lg btn-block')) }}
                </div>

            {{ Form::close() }}
        </div>
    <!--</div>-->
    <br/>
@stop

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
                    <p>Categorie</p>
                    {{ Form::text('category','',array('class' => 'form-control login-field','placeholder' =>'Talen. Code. Wiskunde.')) }}
                    {{ Form::label('category', ' ', array('class' => '' ))}}
                    {{ $errors->first('category', '<span class="error">:message</span>')}}
                </div>

                <div class="form-group {{ ($error) ? 'has-error' : '' }}">
                    <p>Beschrijving</p>
                    {{ Form::textarea('description','',array('class' => 'form-control login-field','placeholder' =>'Ik leer je hoe je ...')) }}
                    {{ Form::label('description', ' ', array('class' => '' ))}}
                    {{ $errors->first('description', '<span class="error">:message</span>')}}
                </div>

                <div class="form-group {{ ($error) ? 'has-error' : '' }}">
                    <p>Waar?</p>
                    {{ Form::text('location','',array('class' => 'form-control login-field','placeholder' =>'Cuperus, Sint-Katelijnevest 51, 2000 Antwerpen')) }}
                    {{ Form::label('location', ' ', array('class' => '' ))}}
                    {{ $errors->first('location', '<span class="error">:message</span>')}}
                </div>

                <div class="form-group {{ ($error) ? 'has-error' : '' }}">
                    <p>Wanneer?</p>
                    {{ Form::text('date','',array('class' => 'form-control login-field','placeholder' =>'15/02/2015')) }}
                    {{ Form::label('date', ' ', array('class' => '' ))}}
                    {{ $errors->first('date', '<span class="error">:message</span>')}}
                </div>

                <div class="form-group {{ ($error) ? 'has-error' : '' }}">
                    <p>Om hoe laat?</p>
                    {{ Form::text('time','',array('class' => 'form-control login-field','placeholder' =>'15:30')) }}
                    {{ Form::label('time', ' ', array('class' => '' ))}}
                    {{ $errors->first('time', '<span class="error">:message</span>')}}
                </div>

                <div class="form-group {{ ($error) ? 'has-error' : '' }}">
                    <p>Duur in minuten?</p>
                    {{ Form::text('duration','',array('class' => 'form-control login-field','placeholder' =>'60')) }}
                    {{ Form::label('duration', ' ', array('class' => '' ))}}
                    {{ $errors->first('duration', '<span class="error">:message</span>')}}
                </div>

                <div class="form-group {{ ($error) ? 'has-error' : '' }}">
                    <p>Benodigdheden</p>
                    {{ Form::text('requirements','',array('class' => 'form-control login-field','placeholder' =>'Pen.')) }}
                    {{ Form::label('requirements', ' ', array('class' => '' ))}}
                    {{ $errors->first('requirements', '<span class="error">:message</span>')}}
                </div>

                <div class="form-group {{ ($error) ? 'has-error' : '' }}">
                    <p>Voorkennis?</p>
                    {{ Form::text('foreknowledge','',array('class' => 'form-control login-field','placeholder' =>'Basis voor frans.')) }}
                    {{ Form::label('foreknowledge', ' ', array('class' => '' ))}}
                    {{ $errors->first('foreknowledge', '<span class="error">:message</span>')}}
                </div>

                <div class="form-group {{ ($error) ? 'has-error' : '' }}">
                    <p>Maximum aantal deelnemers?</p>
                    {{ Form::number('subscribers_amount','',array('class' => 'form-control login-field','placeholder' =>'5')) }}
                    {{ Form::label('subscribers_amount', ' ', array('class' => '' ))}}
                    {{ $errors->first('subscribers_amount', '<span class="error">:message</span>')}}
                </div>

                <div class="form-group {{ ($error) ? 'has-error' : '' }}">
                    <p>Voeg eventueel een afbeelding toe</p>
                    {{ Form::text('picture','',array('class' => 'form-control login-field','placeholder' =>'')) }}
                    {{ Form::label('picture', ' ', array('class' => '' ))}}
                </div>

                <div class="form-group">
                    {{ Form::submit('Maak workshop', array('class' => 'btn btn-primary btn-lg btn-block')) }}
                </div>

            {{ Form::close() }}
        </div>
    <!--</div>-->
    <br/>
@stop

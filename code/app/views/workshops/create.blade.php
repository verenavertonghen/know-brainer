@extends('layouts.default')
@section('title', 'Workshop aanmaken')
@section('container')
<h1 class="text-primary">Maak een workshop</h1>

@if(Auth::check())
<?php $error = false; ?>

        <div class="login-form">
            <?php if($errors->any()) {
                $error = true;
            }?>
            {{ Form::open(['route' => 'workshop.store', 'files' => TRUE]) }}

                <span>Komt te weten..</span><br>
                <label class="descr">Vul het zinnetje aan met wat je te weten komt.</label>
                <div class="form-group {{ ($error) ? 'has-error' : '' }}">
                    {{ Form::text('title','', array('class' => 'form-control login-field','placeholder' =>'(bv. hoe je dit invult, wat je kan invullen)')) }}
                    {{ Form::label('title', ' ', array('class' => 'login-field-icon fui-question-circle'))}}
                    {{ $errors->first('title', '<span class="error">:message</span>')}}
                </div>

                <span>Categorie </span><br>
                <label class="descr">In watvoor categorie bevindt de workshops zich? (bv. koken, verkennen, ...)</label>
                <div class="form-group {{ ($error) ? 'has-error' : '' }}">
                    {{ Form::text('category','',array('class' => 'form-control login-field','placeholder' =>'(bv. talen, code, wiskunde)')) }}
                    {{ Form::label('category', ' ', array('class' => 'login-field-icon fui-tag' ))}}
                    {{ $errors->first('category', '<span class="error">:message</span>')}}
                </div>

                <span>Beschrijving</span><br>
                <label class="descr">Vertel even kort waar de workshop over gaat (max. 250 karakters)</label>
                <div class="form-group {{ ($error) ? 'has-error' : '' }}">
                    {{ Form::textarea('description','',array('class' => 'form-control login-field','placeholder' =>'Ik leer je hoe je ...')) }}
                    {{ Form::label('description', ' ', array('class' => 'login-field-icon fui-new' ))}}
                    {{ $errors->first('description', '<span class="error">:message</span>')}}
                </div>

                <span>Waar</span><br>
                <label class="descr">Waar zal de workshops plaatsvinden?</label>
                <div class="form-group {{ ($error) ? 'has-error' : '' }}">
                    {{ Form::text('location','',array('class' => 'form-control login-field','placeholder' =>'(bv. Cuperus, Sint-Katelijnevest 51, 2000 Antwerpen)')) }}
                    {{ Form::label('location', ' ', array('class' => 'login-field-icon fui-location' ))}}
                    {{ $errors->first('location', '<span class="error">:message</span>')}}
                </div>

                <span>Wanneer</span><br>
                <label class="descr">Wanneer zal het plaatsvinden?</label>
                <div class="form-group {{ ($error) ? 'has-error' : '' }}">
                    {{ Form::text('date','',array('class' => 'form-control login-field','placeholder' =>'(bv. 15/02/2015)','id' => 'date')) }}
                    {{ Form::label('date', ' ', array('class' => 'login-field-icon fui-calendar' ))}}
                    {{ $errors->first('date', '<span class="error">:message</span>')}}
                </div>

                <span>Om hoe laat..</span><br>
                <label class="descr">.. worden we verwacht?</label>
                <div class="form-group {{ ($error) ? 'has-error' : '' }}">
                    {{ Form::text('time','',array('class' => 'form-control login-field','placeholder' =>'(bv. 15:30)')) }}
                    {{ Form::label('time', ' ', array('class' => 'login-field-icon fui-time' ))}}
                    {{ $errors->first('time', '<span class="error">:message</span>')}}
                </div>

                <span>Duur </span><br>
                <label class="descr">Hoelang zal het ongeveer duren? (in minuten)</label>
                <div class="form-group {{ ($error) ? 'has-error' : '' }}">
                    {{ Form::select('6', array('15' => '15min', '30' => '30min', '45' => '45min','60' => '60min', '75' => '75min'), '60min',array('class'=> 'dropdown-menu dropdown-menu-inverse')) }}
                    {{ Form::text('duration','',array('class' => 'form-control login-field','placeholder' =>'60')) }}
                    {{ Form::label('duration', ' ', array('class' => 'login-field-icon fui-triangle-down' ))}}
                    {{ $errors->first('duration', '<span class="error">:message</span>')}}
                </div>

                <span>Benodigdheden</span><br>
                <label class="descr">Is er iets dat we bijmoeten hebben of meebrengen? (Bv. neem een pen mee, breng je eigen gereedschap mee, ...)</label>
                <div class="form-group {{ ($error) ? 'has-error' : '' }}">
                    {{ Form::text('requirements','',array('class' => 'form-control login-field','placeholder' =>'Pen.')) }}
                    {{ Form::label('requirements', ' ', array('class' => 'login-field-icon fui-plus-circle' ))}}
                    {{ $errors->first('requirements', '<span class="error">:message</span>')}}
                </div>

                <span>Voorkennis</span><br>
                <label class="descr">Moet je iets kunnen of weten vooraleer je kan deelnemen? (Bv. basiskennis Frans of in bezit van een rijbewijs zijn)</label>
                <div class="form-group {{ ($error) ? 'has-error' : '' }}">
                    {{ Form::text('foreknowledge','',array('class' => 'form-control login-field','placeholder' =>'Basis voor frans.')) }}
                    {{ Form::label('foreknowledge', ' ', array('class' => 'login-field-icon fui-info-circle' ))}}
                    {{ $errors->first('foreknowledge', '<span class="error">:message</span>')}}
                </div>

                <span>Maximum aantal deelnemers</span><br>
                <label class="descr">Hoeveel personen kunnen er deelnemen?</label>
                <div class="form-group {{ ($error) ? 'has-error' : '' }}">
                    {{ Form::number('subscribers_amount','',array('class' => 'form-control login-field','placeholder' =>'5')) }}
                    {{ Form::label('subscribers_amount', ' ', array('class' => '' ))}}
                    {{ $errors->first('subscribers_amount', '<span class="error">:message</span>')}}
                </div>

                <span>Voeg eventueel een afbeelding toe</span>
                <label>Inspiratie nodig? Vind snel een afbeelding op <a href="http://www.pexels.com/" target="_blank">Pexels</a></label>
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
    <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
     <script src="http://code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
    <script>
        $('#date').datepicker({
        dateFormat: 'dd/mm/yy'
        });
      </script>
@stop

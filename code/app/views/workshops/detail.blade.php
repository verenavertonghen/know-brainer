@extends('layouts.default')
@section('title', 'Workshop')
@section('container')

    <div class="row demo-row">
        <div class="col-xs-9">
        <h2>Kom te weten <span>{{ $workshop->title }}</span></h2>
        <p class="lead">Beschrijving: {{ $workshop->description }}</p>
        <p><strong>Categorie: </strong>{{ $workshop->category }}</p>
        <p><strong>Locatie: </strong>{{ $workshop->location }}</p>
        <p><strong>Max. aantal personen: </strong>{{ $workshop->subscribers_amount }}</p>
        <p><strong>Wanneer: </strong>{{ $workshop->date }}</p>
        <p><strong>Om hoe laat: </strong>{{ $workshop->time }}</p>
        <p><strong>Duur: </strong>{{ $workshop->duration }}</p>
        <p><strong>Benodigdheden: </strong>{{ $workshop->requirements }}</p>
        <p><strong>Voorkennis: </strong>{{ $workshop->foreknowledge }}</p>
        </div>
        <div class="col-xs-3">
        <img src="{{ URL::asset('img/icons/png/Retina-Ready.png') }}" alt="Foto"/>
        </div>
    </div>
    @if(Auth::check())
        <a href="/workshop/{{$workshop->id}}/subscribe">subscribe</a>
        <a href="/workshop/{{$workshop->id}}/unsubscribe">unsubscribe</a>
    @else 
        <p><a href="/login">Log in</a> of <a href="/registreer">maak een account aan</a> om deel te nemen</p>
    @endif

    <div id="sharing">
        <a href="#">Deel dit op Facebook</a>
        <br>
        <a href="mailto:?subject=Workshop:Kom%20te%20weten%20{{$workshop->title }}">Mail deze workshop</a>
    </div>

    <h1>Organisator</h1>
    <div class="row">
        <div id="workshop-user">
        <div class="col-xs-2">
               <img class="img-circle" src="{{$workshop->user->avatar}}" width="125px" alt=""/>
        </div>
        <div class="col-xs-10">
            <strong><p>{{ $workshop->user->username }}</p></strong>
            <p><span  class="lead">{{ $workshop->user->about }}</span>
            <br/>
            </p>
            <p>{{ ($workshop->user->facebook == '') ? '' : '<a href="http://www.facebook.com/'.$workshop->user->facebook.'" target="_blank" class="fb-btn btn btn-info btn-lg btn-block">Facebook</a>' }}</p>
        </div>
        </div>
    </div>

    @if(count($workshop->subscribers) > 0)
        <h1>Deelnemers</h1>
        @foreach($workshop->subscribers as $subscriber)
        <div class="row">
            <div id="workshop-user">
            <div class="col-xs-2">
                   <img class="img-circle" src="{{$subscriber->avatar}}" width="125px" alt=""/>
            </div>
            <div class="col-xs-10">
                <strong><p>{{ $subscriber->username  }}</p></strong>
                <p><span  class="lead">{{ $subscriber->about }}</span>
                <br/>
                </p>
                <p>{{ ($subscriber->facebook == '') ? '' : '<a href="http://www.facebook.com/'.$subscriber->facebook.'" target="_blank" class="fb-btn btn btn-info btn-lg btn-block">Facebook</a>' }}</p>
            </div>
            </div>
        </div>
        @endforeach
    @endif


    <hr>

    <div id="comments">
        <h3>Reacties</h3>
        @if(!$comments->isEmpty())
            @foreach($comments as $key => $value)
        <div class="comment-div">
            <div class="row">
                <div class="col-xs-2">
                    <div id="comment">
                       <img class="img-circle" src="{{$value->user->avatar}}" width="125px" alt=""/>
                    </div>
                </div>
                <div class="col-xs-10">
                    <a class="lead" href="/users/{{ $value->user->id }}">{{ $value->user->username }}</a>
                    <p><strong>{{ $value->comment }}</strong>
                    <br/>
                    <small class="text-muted">{{ $value->created_at->format('d M Y H:i') }}</small>
                    </p>
                </div>
            </div>
        </div>
            @endforeach
        @else
            <p>Er heeft nog niemand een reactie geplaatst.</p>
        @endif

        @if(Auth::check())
            {{ Form::open(array('action' => 'CommentController@store')) }}
            
            <div class="form-group">
            {{ Form::textarea('comment', Input::old('comment'), array('class' => 'form-control','placeholder' =>'Laat weten wat je ervan vindt')) }}
            {{ Form::hidden('fk_workshop', Request::segment(2)) }}
            </div>

            {{ Form::submit('Reageren', array('class' => 'btn btn-primary')) }}

            {{ Form::close() }}
        @else
            <p><a href="/login">Log in</a> om een reactie toe te voegen.</p>
        @endif
    </div>
<br>
@stop
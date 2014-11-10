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
    <div id="sharing">
        <a href="#">Deel dit op Facebook</a><br><a href="mailto:?subject=Workshop:Kom%20te%20weten%20{{$workshop->title }}">Mail deze workshop</a>
    </div>
    <hr>
        <div id="workshop-user">
        <img src="{{$workshop->user->avatar }}" height="100" style="float:left;">
            <ul style="list-style-type:none; float:left; margin-top: -17px; width: 75%;">
                <li><h4>{{ $workshop->user->username }}</h4></li>
                <li>{{ $workshop->user->about }}</li>  
                <li>{{ ($workshop->user->facebook == '') ? '' : '<a href="http://www.facebook.com/'.$workshop->user->facebook.'" target="_blank" class="fb-btn btn btn-info btn-lg btn-block">Facebook</a>' }}</li>
            </ul>
        </div>
  
    <hr>

    <div id="comments">
    <h3>Reacties</h3>
            @if(!$comments->isEmpty())
                @foreach($comments as $key => $value)
                   <div id="comment">
                      <p><img src="{{$value->user->avatar}}" width="30"> {{ $value->comment }} - <a href="/users/{{ $value->user->id }}">{{ $value->user->username }}</a> ({{ $value->created_at->format('d M Y H:i') }})</p>
                   </div>
                @endforeach
            @else 
                <p>Er heeft nog niemand een reactie geplaatst.</p>
            @endif
        </div>
    @if(Auth::check())
            {{ Form::open(array('action' => 'CommentController@store')) }}
            
            <div class="form-group">
            {{ Form::label('comment', 'Voeg een reactie toe') }}
            {{ Form::textarea('comment', Input::old('comment'), array('class' => 'form-control')) }}
            {{ Form::hidden('fk_workshop', Request::segment(2)) }}
            </div>

            {{ Form::submit('Reageren', array('class' => 'btn btn-primary')) }}

            {{ Form::close() }}
        @else
            <p><a href="/login">Log in</a> om een reactie toe te voegen.</p>
        @endif
<br>
@stop
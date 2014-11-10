@extends('layouts.default')
@section('title', 'Workshop')
@section('container')

    <div class="row demo-row">
        <div class="col-xs-9">
        <h2>Kom te weten hoe je <span>{{ $workshop->title }}</span></h2>
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
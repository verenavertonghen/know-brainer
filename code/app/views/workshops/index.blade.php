@extends('layouts.default')
@section('title', 'Alle workshops')
@section('container')

    <div class="row demo-row">
        <div class="row demo-row">
            <div class="col-xs-8">
                <h1 class="text-primary">Kom te weten..</h1>

            @if($workshops->count())
                @foreach($workshops as $workshop)
                <div class="workshop-div" style="background-image: url('{{ URL::asset($workshop->picture) }}'); background-size: 100% 100%">

                    <div class="row demo-row">
                        <div class="col-xs-12" style="margin-top:70px;background-color: rgba(255, 255, 255, 0.92);">
                        <h3>... <span>{{ $workshop->title }}</span></h3>
                        <p class="lead">{{ $workshop->description }}</p>
                        <a>{{ link_to("/workshop/{$workshop->id}", "Meer info") }}</a>
                        <div style="float:right"><a href="{{$workshop->user->id}}"><img src="{{$workshop->user->avatar}}" width="50" style="border-radius:50px"></a></div>
                        </div>

                        @if($workshop->picture != null)
                        <!--<img class="workshop-img" src="{{ URL::asset($workshop->picture) }}" style="display: block; position: absolute; left:0; overflow:hidden" width="600" alt="Foto"/>-->
                         @else
                        <img class="workshop-img" src="{{ URL::asset('/img/icons/png/Retina-Ready.png') }}" alt="Foto"/>
                         @endif
                    </div>

                </div>
                @endforeach
            @else
                <p>Er zijn spijtig genoeg nog geen workshops, voeg jij er een toe?</p>
            @endif
        </div>
        <div class="col-xs-4">
        <h2>.. hoe jij kan delen</h2>
        <p>Je kan zelf heel snel workshop geven</p>
        <a href="/workshop/create">Geef een workshop</a>
    </div>

@stop
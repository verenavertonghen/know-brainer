@extends('layouts.default')
@section('title', 'Alle workshops')
@section('container')

        <h1 class="text-primary">Bekijk alle workshops!</h1>

    @if($workshops->count())
        @foreach($workshops as $workshop)
        <div class="workshop-div">
            <div class="row demo-row">
                <div class="col-xs-9">
                <h3>Kom te weten <span>{{ $workshop->title }}</span></h3>
                <p class="lead">Beschrijving: {{ $workshop->description }}</p>
                <a>{{ link_to("/workshop/{$workshop->id}", "Meer info") }}</a>
                </div>
                <div class="col-xs-3">
                @if($workshop->picture != null)
                <img class="workshop-img" src="{{ URL::asset($workshop->picture) }}" style="display: block;max-width:200px;max-height:200px;width: auto;height: auto; "alt="Foto"/>
                 @else
                <img class="workshop-img" src="{{ URL::asset('/img/icons/png/Retina-Ready.png') }}" alt="Foto"/>
                 @endif
                </div>
            </div>
        </div>
        @endforeach
    @else
        <p>Er zijn spijtig genoeg nog geen workshops, voeg jij er een toe?</p>
    @endif

@stop
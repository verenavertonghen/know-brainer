@extends('layouts.default')
@section('title', 'Alle workshops')
@section('container')

        <h1 class="text-primary">Bekijk alle workshops!</h1>

    @if($workshops->count())
        @foreach($workshops as $workshop)
        <div class="row demo-row">
            <div class="col-xs-9">
            <h3>Kom te weten hoe je <span>{{ $workshop->title }}</span></h3>
            <p class="lead">Beschrijving: {{ $workshop->description }}</p>
            <a>{{ link_to("/workshop/{$workshop->id}", "Meer info") }}</a>
            </div>
            <div class="col-xs-3">
            <img src="{{ URL::asset('img/icons/png/Retina-Ready.png') }}" alt="Foto"/>
            </div>
        </div>
        @endforeach
    @else
        <p>Er zijn spijtig genoeg nog geen workshops, voeg jij er een toe?</p>
    @endif

@stop
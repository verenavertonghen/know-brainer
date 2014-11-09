@extends('layouts.default')

@section('container')

    @if($workshops->count())
        @foreach($workshops as $workshop)
        <div class="row demo-row">
        <h1>Bekijk alle workshops!</h1>
            <div class="col-xs-9">
            <h1>Titel: {{ $workshop->title }}</h1>
            <p>Beschrijving: {{ $workshop->description }}</p>
            <p>Categorie: {{ $workshop->category }}</p>
            <p>Locatie: {{ $workshop->location }}</p>
            <p>Max. aantal personen: {{ $workshop->subscribers_amount }}</p>
            <p>Start Datum en tijdstip: {{ $workshop->start_date }}</p>
            <p>Start Datum en tijdstip: {{ $workshop->end_date }}</p>
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
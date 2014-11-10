@extends('layouts.default')

@section('container')

    <div class="row demo-row">
        <div class="col-xs-9">
        <h2>Kom te weten hoe je <span>{{ $workshop->title }}</span></h2>
        <p class="lead">Beschrijving: {{ $workshop->description }}</p>
        <p><strong>Categorie: </strong>{{ $workshop->category }}</p>
        <p><strong>Locatie: </strong>{{ $workshop->location }}</p>
        <p><strong>Max. aantal personen: </strong>{{ $workshop->subscribers_amount }}</p>
        <p><strong>Start Datum en tijdstip: </strong>{{ $workshop->start_date }}</p>
        <p><strong>Start Datum en tijdstip: </strong>{{ $workshop->end_date }}</p>
        </div>
        <div class="col-xs-3">
        <img src="{{ URL::asset('img/icons/png/Retina-Ready.png') }}" alt="Foto"/>
        </div>
    </div>

@stop
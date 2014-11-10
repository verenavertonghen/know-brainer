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

@stop
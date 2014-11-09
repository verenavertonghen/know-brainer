@extends('layouts.default')

@section('container')

    <div class="row demo-row">
    <h1>Bekijk alle workshops!</h1>
        <div class="col-xs-9">
        <h1>Titel</h1>
        <p>Tags/Onderwerp</p>
        <p>Beschrijving</p>
        <p>Locatie</p>
        <p>Max. aantal personen</p>
        <p>Datum en tijdstip</p>
        </div>
        <div class="col-xs-3">
        <img src="{{ URL::asset('img/icons/png/Retina-Ready.png') }}" alt="Foto"/>
        </div>
    </div>

@stop
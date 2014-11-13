@extends('layouts.default')
@section('title', 'Home')
@section('container')
      
    <div class="row" id="brand">
    <div class="col-xs-4">
        <img class="kb-logo" src="img/logo/yv2.png">
    </div>
    <div class="col-xs-8">
        <p class="lead">"Iedereen kan iets, niemand kan alles..</p>
        <p class="lead">.. maar door kennis te delen, kunnen we onszelf <br>&amp; anderen iets leren.”</p>
    </div>
    </div>

      <div class="row">
        <div class="col-xs-12">
        <h1 class="">Kom te weten.. </h1>
        </div>
        <div class="col-xs-12">
        @foreach($workshops as $key => $value)
	        <div class="workshop-item">
            <a href="/workshop/{{ $value->id }}">
                <div class="work-title museo-heading">
                <p>...{{{$value->title}}}</p>
                </div>
	        	<img src="{{$value->picture}}" width="370px">
            </a>
	        </div>
        @endforeach
	        <div class="workshop-item">
            <a href="/workshop/create">
                <div class="work-title museo-heading">
                U wil ook iets delen? Dat kan hier
                </div>
                <img src="img/uploads/workshops/default-workshop.png" width="370px">
            </a>
            </div>
	        	
	        </div>
        </div>
        <div class="col-xs-12" id="sharing">
            <div class="row">
                <div class="col-xs-6">
                    <h2><a href="/workshop">Ik wil kennis..</a></h2>
                    <p>Zoek, schrijf je in, veel plezier &amp; vergeet geen kadotje</p>
                </div>
                <div class="col-xs-6">
                    <h2><a href="/workshop/create">.. delen</a></h2>
                    <p>Geef je op, vergeet de details niet, deel volop &amp; bedankt!</p>
                </div>
             </div>
        </div>
      </div>


@stop



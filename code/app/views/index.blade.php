@extends('layouts.default')
@section('title', 'Home')
@section('container')
      


      <div class="row">

        <div class="col-xs-12">
        @foreach($workshops as $key => $value)
	        <div class="workshop-item">
	        	<img src="{{$value->picture}}" width="300">
	        </div>
        @endforeach
	        <div class="workshop-item">
	        	<p>Jij wil ook iets delen? Dat kan hier</p>
	        </div>
        </div>
        <div class="col-xs-12">
         <h2><a href="/workshop">Ik wil kennis..</a></h2>
         <p>Zoek, schrijf je in, veel plezier &amp; vergeet geen kadotje</p>
         <h2><a href="/workshop/create">.. delen</a></h2>
         <p>Geef je op, vergeet de details niet, deel volop &amp; bedankt!</p>
        </div>
      </div>


@stop



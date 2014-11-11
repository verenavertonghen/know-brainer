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
        <div class="col-xs-4">
        <div class="demo-headline">
        <img src="{{ URL::asset('img/logo/yv1.png') }}" height="300px" alt=""/>
        <h1 class="demo-logo">
          <!--<div class="logo"></div>-->
          Know-brainer
        </h1>
        <p class="lead">"Iedereen kan iets, niemand kan alles..</p>
        <p class="lead">.. maar door kennis te delen, kunnen we onszelf en anderen iets leren.”</p>
      </div>  <!--/demo-headline -->
        </div>
        </div>


@stop



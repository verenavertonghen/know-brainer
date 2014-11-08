@extends('layouts.default')


@section('search')
    <!--Zoekbalk-->
    <form class="navbar-form navbar-right" action="#" role="search">
      <div class="form-group">
        <div class="input-group">
          <input class="form-control" id="navbarInput-01" type="search" placeholder="Zoeken">
          <span class="input-group-btn">
            <button type="submit" class="btn"><span class="fui-search"></span></button>
          </span>
        </div>
      </div>
    </form>
@stop

@section('container')
<div class="demo-headline">
    <h1 class="demo-logo">
      <div class="logo"></div>
      Know-brainer
      <small>"Iedereen kan iets, niemand kan alles..</small>
      <small>.. maar door kennis te delen, kunnen we onszelf en anderen iets leren.”</small>
    </h1>
</div>  <!--/demo-headline -->
@stop



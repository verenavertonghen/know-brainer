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

    <div class="row demo-row">
    <h1>Bekijk alle workshops!</h1>
    </div>

@stop
<?php 
$ownprofile = false;
(Auth::check()) ? ((Request::segment(2) == Auth::user()->id) ? $ownprofile = true : '') : '' ; 
?>

@extends('layouts.default')

@section('title')
	@if($ownprofile) 
		Mijn profiel
	@else
		Profiel {{ $user->username }}
	@endif
@stop

@section('container')
<div class="container">
    <div class="row demo-row">
        <div class="col-xs-4">


            <img src="{{ $user->avatar }}" height="300px" class="img-circle">
            <h2>
                            {{ $user->username }}

            </h2>
            <small class="text-muted"><p>Lid sinds: {{ $user->created_at->format('d M Y') }}</p></small>

            <br/>


		</div>

		<div class="col-xs-6">
            <h5>Over mij</h5>
            <p>{{ ($user->about == '') ? (($ownprofile) ? '<i>Het is hier voorlopig vrij leeg</i> <a href="/users/'. Auth::user()->id.'/edit">Waarom voeg je niets toe?</a>' : '' ) : $user->about  }}</p>

            <h4>Je kan me ook vinden op</h4>
            <p>
                {{ ($user->facebook == '') ? '' : '<a class="fui-facebook social-icon" href="http://www.facebook.com/'.$user->facebook.'"></a></li>' }}
                {{ ($user->twitter == '') ? '' : '<a class="fui-twitter social-icon" href="http://www.twitter.com/'.$user->twitter.'"></a></li>' }}
                {{ ($user->github == '') ? '' : '<a class="fui-github social-icon" href="http://www.github.com/'.$user->github.'"></a></li>' }}
                {{ ($user->website == '') ? '' : '<a class="fui-link social-icon" href="http://'.$user->website.'"></a></li>' }}
                {{ ($user->youtube == '') ? '' : '<a class="fui-youtube social-icon" href="http://youtube.com/'.$user->youtube.'"></a></li>' }}
            </p>
		</div>
		<div class="col-xs-1">
		@if($ownprofile)
        <a class="btn btn-small btn-info" href="/users/{{ Auth::user()->id }}/edit">Bewerk uw profiel</a>
        @endif
		</div>
	</div>
    <div class="row demo-row">
		<h5>Workshops waar ik organisator van ben</h5>

		@if(!$user->ownWorkshops->isEmpty())
            <table class="table table-striped table-bordered">

                <thead>
                    <tr>
                        <td>Kom te weten ...</td>
                        <td>Categorie</td>
                        <td>Tijdstip</td>
                        <td>Acties</td>
                    </tr>
                </thead>

                <tbody>

                @foreach($user->ownWorkshops as $ownWorkshop)
                    <tr>
                        <td>{{ $ownWorkshop->title }}</td>
                        <td>{{ $ownWorkshop->category }}</td>
                        <td>{{ $ownWorkshop->date }}<br/>{{ $ownWorkshop->time }}</td>
                        <td>
                            <a class="btn btn-small btn-success" href="{{ URL::to('workshop/' . $ownWorkshop->id) }}">Details</a>
                            <a class="btn btn-small btn-info" href="{{ URL::to('workshop/' . $ownWorkshop->id . '/edit') }}">Bewerk</a>
                            <a class="btn btn-small btn-danger" href="{{ URL::to('workshop/' . $ownWorkshop->id . '/delete') }}">Annuleer</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        @else
            <p>Helaas, hebt nog geen workshops waar je organisator van bent.</p>
        @endif
    </div>
    <div class="row demo-row">
        <h5>Workshops waarvoor ik ben ingeschreven</h5>

        		@if(!$user->workshops->isEmpty())
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <td>Kom te weten ...</td>
                                <td>Categorie</td>
                                <td>Tijdstip</td>
                                <td>Acties</td>
                            </tr>
                        </thead>
                        <tbody>

                        @foreach($user->workshops as $workshop)
                            <tr>
                                <td>{{ $workshop->title }}</td>
                                <td>{{ $workshop->category }}</td>
                                <td><p>{{ $workshop->date}}</p><p>{{ $workshop->time }}</p></td>
                                <td> <a href="/workshop/{{$workshop->id}}/unsubscribe">unsubscribe</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                @else
                    <p>Helaas, je bent nog niet ingeschreven voor een workshop.</p>
                @endif
    </div>
    <div class="row demo-row">
    <h5>Account verwijderen</h5>
    @if($ownprofile)
        {{ Form::open(array('url' => '/users/' . Auth::user()->id)) }}
            {{ Form::hidden('_method', 'DELETE') }}
            {{ Form::submit('Verwijder mijn account', array('class' => 'btn btn-danger')) }}
        {{ Form::close() }}
    @endif
    </div>
</div>
<br>
@stop

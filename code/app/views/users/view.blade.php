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
		<h2>{{ $user->username }}
			@if($ownprofile) 
			<span><a href="/users/{{ Auth::user()->id }}/edit">Bewerk uw profiel</a></span>
			@endif
		</h2>
		<p>Lid sinds: {{ $user->created_at->format('d M Y') }}</p>

		<img src="{{ $user->avatar }}">
		<h2>Over mij</h2>
		<p>{{ ($user->about == '') ? (($ownprofile) ? '<i>Het is hier voorlopig vrij leeg</i> <a href="/users/'. Auth::user()->id.'/edit">Waarom voeg je niets toe?</a>' : '' ) : $user->about  }}</p>
		<h2>Je kan me ook vinden op</h2>
		<ul>
			{{ ($user->facebook == '') ? '' : '<li><a href="http://www.facebook.com/'.$user->facebook.'">Facebook</a></li>' }}
			{{ ($user->twitter == '') ? '' : '<li><a href="http://www.twitter.com/'.$user->twitter.'">Twitter</a></li>' }}
			{{ ($user->github == '') ? '' : '<li><a href="http://www.github.com/'.$user->github.'">github</a></li>' }}
			{{ ($user->website == '') ? '' : '<li><a href="http://'.$user->website.'">website</a></li>' }}
			{{ ($user->youtube == '') ? '' : '<li><a href="http://youtube.com/'.$user->youtube.'">website</a></li>' }}
		</ul>
		@if($ownprofile) 

			{{ Form::open(array('url' => '/users/' . Auth::user()->id)) }}
                    {{ Form::hidden('_method', 'DELETE') }}
                    {{ Form::submit('Verwijder mijn account', array('class' => 'btn btn-danger')) }}
                {{ Form::close() }}
		@endif

		<h2>Workshops waar ik organisator van ben</h2>

		@if(!$user->ownWorkshops->isEmpty())
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                    	<td>Afbeelding</td>
                        <td>Kom te weten ...</td>
                        <td>Categorie</td>
                        <td>Tijdstip</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>

                @foreach($user->ownWorkshops as $ownWorkshop)
                    <tr>
                    	<td><img src="{{ $ownWorkshop->picture }}" width="30"></td>
                        <td>{{ $ownWorkshop->title }}</td>
                        <td>{{ $ownWorkshop->category }}</td>
                        <td>{{ $ownWorkshop->date.$ownWorkshop->time }}</td>


                        <td>
                            <a class="btn btn-small btn-success" href="{{ URL::to('workshop/' . $ownWorkshop->id) }}">Details</a>
                            <a class="btn btn-small btn-info" href="{{ URL::to('workshop/' . $ownWorkshop->id . '/edit') }}">Bewerk</a>
                            <a class="btn btn-small btn-danger" href="{{ URL::to('workshop/' . $ownWorkshop->id . '/delete') }}">Verwijder</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        @else
            <p>Helaas, hebt nog geen workshops waar je organisator van bent.</p>
        @endif

        <h2>Workshops waarvoor ik ben ingeschreven</h2>

        		@if(!$user->workshops->isEmpty())
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                            	<td>Afbeelding</td>
                                <td>Kom te weten ...</td>
                                <td>Categorie</td>
                                <td>Tijdstip</td>
                            </tr>
                        </thead>
                        <tbody>

                        @foreach($user->workshops as $workshop)
                            <tr>
                            	<td><img src="{{ $workshop->picture }}" width="30"></td>
                                <td>{{ $workshop->title }}</td>
                                <td>{{ $workshop->category }}</td>
                                <td>{{ $workshop->date.$workshop->time }}</td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                @else
                    <p>Helaas, je bent nog niet ingeschreven voor een workshop.</p>
                @endif
</div>
<br>
@stop

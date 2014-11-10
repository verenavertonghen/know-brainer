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
		<p>{{ ($user->over == '') ? (($ownprofile) ? '<i>Het is hier voorlopig vrij leeg</i> <a href="/users/'. Auth::user()->id.'/edit">Waarom voeg je niets toe?</a>' : '' ) : $user->over  }}</p>
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
</div>
<br>
@stop

<?php 
$ownprofile = false;
(Auth::check()) ? ((Request::segment(2) == Auth::user()->id) ? $ownprofile = true : '') : '' ; 
?>

@extends('layouts.default')
@section('container')
<div class="container">
		<h2>{{ $user->username }}
			@if($ownprofile) 
			<span><a href="/users/{{ Auth::user()->id }}/edit">Edit your details</a></span>
			@endif
		</h2>


		<img src="{{ $user->avatar }}">
		<h2>About</h2>
		<p>{{ ($user->over == '') ? (($ownprofile) ? '<i>It\'s rather empty here.</i> <a href="/users/'. Auth::user()->id.'/edit">Why don\'t you add something?</a>' : '' ) : $user->over  }}</p>
		<h2>You can find me on</h2>
		<ul>
			{{ ($user->facebook == '') ? '' : '<li><a href="http://www.facebook.com/'.$user->facebook.'">Facebook</a></li>' }}
			{{ ($user->twitter == '') ? '' : '<li><a href="http://www.twitter.com/'.$user->twitter.'">Twitter</a></li>' }}
			{{ ($user->github == '') ? '' : '<li><a href="http://www.github.com/'.$user->github.'">github</a></li>' }}
			{{ ($user->website == '') ? '' : '<li><a href="http://'.$user->website.'">website</a></li>' }}
		</ul>
		@if($ownprofile) 

			{{ Form::open(array('url' => '/users/' . Auth::user()->id)) }}
                    {{ Form::hidden('_method', 'DELETE') }}
                    {{ Form::submit('Delete my account', array('class' => 'btn btn-danger')) }}
                {{ Form::close() }}
		@endif
</div>
<br>
@stop

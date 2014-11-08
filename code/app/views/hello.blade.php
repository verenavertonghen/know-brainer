@extends('layouts.default')
@section('content')
	<div class="container">
		<h1>This is project Knowbrainer</h1>
		{{ (Auth::check()) ? 'Welkom, '. Auth::user()->username : '' }}
	</div>
		
@stop
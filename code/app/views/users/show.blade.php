@extends('layouts.default')
@section('container')

<h1>Alle gebruikers</h1>
@if(!$users->isEmpty())
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
            	<td>Avatar</td>
                <td>Username</td>
                <td>Email</td>
                <td>Lid sinds</td>
                <td></td>
            </tr>
        </thead>
        <tbody>

        @foreach($users as $key => $value)
            <tr>
            	<td><img src="{{ $value->avatar }}" width="30"></td>
                <td>{{ $value->username }}</td>
                <td>{{ $value->email}}</td>
                <td>{{ $value->created_at->format('d-M-Y H:m') }}</td>

                
                <td>
                    <a class="btn btn-small btn-success" href="{{ URL::to('users/' . $value->id) }}">Profiel</a>
                    <a class="btn btn-small btn-info" href="{{ URL::to('users/' . $value->id . '/edit') }}">Bewerk</a>
                    <a class="btn btn-small btn-danger" href="{{ URL::to('users/' . $value->id . '/delete') }}">Verwijder</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="pagination">
    	<?php echo $users->links(); ?>
    </div>
@else 
    <p>Helaas, er zijn nog geen gebruikers.</p>
@endif

@stop
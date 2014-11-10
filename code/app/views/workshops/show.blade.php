@extends('layouts.default')
@section('container')
@section('title', 'Alle workshops')
<h1>Alle workshops</h1>
@if(!$workshops->isEmpty())
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

        @foreach($workshops as $key => $value)
            <tr>
            	<td><img src="{{ $value->picture }}" width="30"></td>
                <td>{{ $value->title }}</td>
                <td>{{ $value->category }}</td>
                <td>{{ $value->date.$value->time }}</td>

                
                <td>
                    <a class="btn btn-small btn-success" href="{{ URL::to('workshop/' . $value->id) }}">Details</a>
                    <a class="btn btn-small btn-info" href="{{ URL::to('workshop/' . $value->id . '/edit') }}">Bewerk</a>
                    <a class="btn btn-small btn-danger" href="{{ URL::to('workshop/' . $value->id . '/delete') }}">Verwijder</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="pagination">
    	<?php echo $workshops->links(); ?>
    </div>
@else 
    <p>Helaas, er zijn nog geen workshops.</p>
@endif

@stop
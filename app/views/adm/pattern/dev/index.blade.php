@extends('adm.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Výrobci zboží
@stop

{{-- Content --}}
@section('content')
@if ($devs->count())
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th>#</th>
                <th>Název skupiny</th>
                <th>Aktivita</th>
                <th><span class="glyphicon glyphicon-paperclip"></span></th>
            </tr>
            </thead>
            <tbody>
            @foreach ($devs as $dev)
            <tr>
                <td>{{ $dev->id }}</td>
                <td>{{ $dev->name }}</td>
                <td>{{ ($dev->active ? 'Aktivní' : 'Neaktivní' )}}</td>


                <td></td>
                <td></td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endif
<p class="text-center">
    {{ link_to_route('adm.pattern.dev.create','Přidat nového výrobce',NULL, array('class'=>'btn btn-success','role'=> 'button')) }}
</p>
@stop
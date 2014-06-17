@extends('adm.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Skupiny výrobců
@stop

{{-- Content --}}
@section('content')
@if ($devgroup->count())
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th>#</th>
                <th>Název skupiny</th>
                <th>Výrobci ve skupině</th>
                <th><span class="glyphicon glyphicon-paperclip"></span></th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach ($devgroup as $dev)
            <tr>
                <td>{{ $dev->id }}</td>
                <td>{{ $dev->name }}</td>
                <td>@foreach ($dev->dev as $one) {{ $one->name.' '; }} @endforeach</td>
                <td>{{ count($dev->dev)}}</td>
                <td>{{ link_to_route('adm.pattern.devgroup.edit','Edit',array($dev->id),array('class' => 'btn btn-info btn-xs')) }}</td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endif
<p class="text-center">
    {{ link_to_route('adm.pattern.devgroup.create','Přidat novou skupinu výrobců',NULL, array('class'=>'btn btn-success','role'=> 'button')) }}
</p>
@stop
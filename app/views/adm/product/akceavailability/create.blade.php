@extends('adm.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Přidat novou platnost akce
@stop

{{-- Content --}}
@section('content')
{{ Form::open(array('route' => 'adm.product.akceavailability.store','class' => 'form-horizontal', 'role' => 'form')) }}
<div class="form-group">
    {{ Form::label('name', 'Dostupnost', array('class'=> 'col-sm-2 control-label')) }}
    <div class="col-sm-10">
        {{ Form::text('name', NULL, array('required' => 'required', 'maxlength' => '168', 'class'=> 'form-control', 'placeholder'=> 'Nový text pro platnost akce')) }}
    </div>
</div>
<p class="text-center">
    {{ link_to_route('adm.product.akceavailability.index','Zobrazit všechny platnosti akce', NULL, array('class'=>'btn btn-primary','role'=> 'button')) }}
    {{ Form::submit('Přidat novou akční platnost', array('class' => 'btn btn-success')) }}
</p>
{{ Form::close() }}
@stop
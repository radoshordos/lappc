@extends('adm.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Přidat novou záruku
@stop

{{-- Content --}}
@section('content')
{{ Form::open(array('route' => 'adm.pattern.prodwarranty.store','class' => 'form-horizontal', 'role' => 'form')) }}
<div class="form-group">
    {{ Form::label('id', '#ID', array('class'=> 'col-sm-2 control-label')) }}
    <div class="col-sm-10">
        {{ Form::input('number','id', NULL, array('required' => 'required', 'min' => '1', 'max' => '255', 'class'=> 'form-control', 'placeholder'=> '#ID')) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('name', 'Dostupnost', array('class'=> 'col-sm-2 control-label')) }}
    <div class="col-sm-10">
        {{ Form::text('name', NULL, array('required' => 'required', 'maxlength' => '32', 'class'=> 'form-control', 'placeholder'=> 'Nový text pro dobu záruky')) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('warranty_month', 'Doba záruky v měsícich', array('class'=> 'col-sm-2 control-label')) }}
    <div class="col-sm-10">
        {{ Form::input('number','warranty_month', NULL, array('required' => 'required', 'min' => '0', 'max' => '360', 'class'=> 'form-control', 'placeholder'=> 'Doba záruky v měsícich')) }}
    </div>
</div>

<p class="text-center">
    {{ link_to_route('adm.pattern.prodwarranty.index','Zobrazit všechny záruky', NULL, array('class'=>'btn btn-primary','role'=> 'button')) }}
    {{ Form::submit('Přidat novu záruku', array('class' => 'btn btn-success')) }}
</p>
{{ Form::close() }}
@stop
@extends('adm.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Nová variace
@stop

{{-- Content --}}
@section('content')
{{ Form::open(array('route' => 'adm.pattern.prodvariation.store','class' => 'form-horizontal', 'role' => 'form')) }}

<div class="form-group">
    {{ Form::label('id', '#ID', array('class'=> 'col-sm-2 control-label')) }}
    <div class="col-sm-10">
        {{ Form::number('id', NULL, array('required' => 'required', 'class'=> 'form-control', 'min' => '1', 'max' => '10000', 'placeholder'=> '#ID variace')) }}
    </div>
</div>

<div class="form-group">
    {{ Form::label('set_id', 'Zařazení',array('class'=> 'col-sm-2 control-label')) }}
    <div class="col-sm-10">
        {{ Form::select('set_id',$select_difference_set, NULL, array('required' => 'required', 'class'=> 'form-control', 'placeholder'=> 'Shoda slov')) }}
    </div>
</div>

<div class="form-group">
    {{ Form::label('name', 'Název',array('class'=> 'col-sm-2 control-label')) }}
    <div class="col-sm-10">
        {{ Form::text('name', NULL, array('required' => 'required', 'class'=> 'form-control', 'placeholder'=> 'Název pro variaci')) }}
    </div>
</div>

<p class="text-center">
    {{ link_to_route('adm.pattern.prodvariation.index','Zobrazit všechny variace',NULL, array('class'=>'btn btn-primary','role'=> 'button')) }}
    {{ Form::submit('Přidat novou variaci', array('class' => 'btn btn-success')) }}
</p>
{{ Form::close() }}
@stop
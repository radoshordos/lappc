@extends('adm.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Přidat nového výrobce
@stop

{{-- Content --}}
@section('content')
{{ Form::open(array('route' => 'adm.pattern.dev.store','class' => 'form-horizontal', 'role' => 'form')) }}
<div class="form-group">
    {{ Form::label('id','ID',array('class'=> 'col-sm-2 control-label')) }}
    <div class="col-sm-10">
        {{ Form::input('number','id',NULL,array('min'=> '1','max'=> '999','required' => 'required','class'=> 'form-control', 'placeholder'=> 'ID určené pro výrobce')) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('name','Název výrobce',array('class'=> 'col-sm-2 control-label')) }}
    <div class="col-sm-10">
        {{ Form::text('name',NULL,array('required' => 'required', 'maxlength' => '32', 'class'=> 'form-control', 'placeholder'=> 'Název výrobce')) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('default_warranty_id','Výchozí záruka',array('class'=> 'col-sm-2 control-label')) }}
    <div class="col-sm-10">
        {{ Form::select('default_warranty_id',$select_warranty, NULL, array('required' => 'required', 'class'=> 'form-control', 'placeholder'=> 'Výchozí záruka pro
        výrobce')) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('default_sale_id','Výchozí sleva',array('class'=> 'col-sm-2 control-label')) }}
    <div class="col-sm-10">
        {{ Form::select('default_sale_id',$select_sale, NULL, array('required' => 'required', 'class'=> 'form-control', 'placeholder'=> 'Výchozí sleva pro
        výrobce')) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('default_availibility_id','Výchozí dostupnost',array('class'=> 'col-sm-2 control-label')) }}
    <div class="col-sm-10">
        {{ Form::select('default_availibility_id',$select_availability, NULL, array('required' => 'required', 'class'=> 'form-control', 'placeholder'=> 'Výchozí
        dostupnost pro výrobce')) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('authorized','Autorizovaný prodej',array('class'=> 'col-sm-2 control-label')) }}
    <div class="col-sm-10">
        {{ Form::checkbox('authorized', 'value') }}
    </div>
</div>


<p class="text-center">
    {{ link_to_route('adm.pattern.dev.index','Zobrazit všechny výrobce',NULL, array('class'=>'btn btn-primary','role'=> 'button')) }}
    {{ Form::submit('Vložit nového výrobce', array('class' => 'btn btn-success')) }}
</p>

{{ Form::close() }}
@stop
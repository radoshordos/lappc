@extends('adm.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Editace výrobce zboží
@stop

{{-- Content --}}
@section('content')

{{ Form::model($dev, array('method'=>'PATCH','route' => array('adm.pattern.dev.update',$dev->id),'class'=>'form-horizontal','role'=>'form')) }}
<div class="form-group">
    {{ Form::label('id','ID',array('class'=> 'col-sm-2 control-label')) }}
    <div class="col-sm-10">
        {{ Form::input('number','id',NULL,array('min'=> '1','max'=> '999','required' => 'required','class'=> 'form-control', 'placeholder'=> 'ID určené pro výrobce')) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('alias','Alias',array('class'=> 'col-sm-2 control-label')) }}
    <div class="col-sm-10">
        {{ Form::text('alias',NULL,array('required' => 'required', 'maxlength' => '32', 'class'=> 'form-control', 'placeholder'=> 'Alias výrobce')) }}
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
        {{ Form::select('default_warranty_id',$select_warranty, NULL, array('required' => 'required', 'class'=> 'form-control', 'placeholder'=> 'Výchozí záruka pro výrobce')) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('default_sale_id','Výchozí sleva',array('class'=> 'col-sm-2 control-label')) }}
    <div class="col-sm-10">
        {{ Form::select('default_sale_id',$select_sale, NULL, array('required' => 'required', 'class'=> 'form-control', 'placeholder'=> 'Výchozí sleva pro výrobce')) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('default_availibility_id','Výchozí dostupnost',array('class'=> 'col-sm-2 control-label')) }}
    <div class="col-sm-10">
        {{ Form::select('default_availibility_id',$select_availability, NULL, array('required' => 'required', 'class'=> 'form-control', 'placeholder'=> 'Výchozí dostupnost pro výrobce')) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('active','Aktivní výrobce',array('class'=> 'col-sm-2 control-label')) }}
    <div class="col-sm-10">
        {{ Form::select('active',['0' => 'NE','1' => 'ANO'], NULL, array('class'=> 'form-control')) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('authorized','Autorizovaný prodejce',array('class'=> 'col-sm-2 control-label')) }}
    <div class="col-sm-10">
        {{ Form::select('authorized',['0' => 'NE','1' => 'ANO'], NULL, array('class'=> 'form-control')) }}
    </div>
</div>
<p class="text-center">
    {{ link_to_route('adm.pattern.dev.index','Zobrazit všechny výrobce',NULL, array('class'=>'btn btn-primary','role'=> 'button')) }}
    {{ Form::submit('Editovat výrobce', array('class' => 'btn btn-info')) }}
</p>

{{ Form::close() }}
@stop
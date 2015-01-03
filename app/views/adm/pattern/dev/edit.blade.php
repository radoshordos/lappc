@extends('adm.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Editace výrobce zboží
@stop

{{-- Content --}}
@section('content')
{{ Form::model($dev, ['method'=>'PATCH','route' => ['adm.pattern.dev.update',$dev->id],'class'=>'form-horizontal','role'=>'form']) }}
<div class="form-group">
    {{ Form::label('id','#ID',['class'=> 'col-sm-3 control-label']) }}
    <div class="col-sm-9">
        {{ Form::input('number','id',NULL,['min'=> '1','max'=> '999','required' => 'required','readonly' => 'readonly', 'class'=> 'form-control', 'placeholder'=> '#ID určené pro výrobce']) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('alias','Alias',['class'=> 'col-sm-3 control-label']) }}
    <div class="col-sm-9">
        {{ Form::text('alias',NULL,['required' => 'required', 'maxlength' => '32', 'readonly' => 'readonly', 'class'=> 'form-control', 'placeholder'=> 'Alias výrobce']) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('name','Název výrobce',['class'=> 'col-sm-3 control-label']) }}
    <div class="col-sm-9">
        {{ Form::text('name',NULL,['required' => 'required', 'maxlength' => '32', 'class'=> 'form-control', 'placeholder'=> 'Název výrobce']) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('default_warranty_id','Výchozí záruka',['class'=> 'col-sm-3 control-label']) }}
    <div class="col-sm-9">
        {{ Form::select('default_warranty_id',$select_warranty, NULL, ['required' => 'required', 'class'=> 'form-control', 'placeholder'=> 'Výchozí záruka pro výrobce']) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('default_sale_prod_id','Výchozí sleva produktu',['class'=> 'col-sm-3 control-label']) }}
    <div class="col-sm-9">
        {{ Form::select('default_sale_prod_id',$select_sale, NULL, ['required' => 'required', 'class'=> 'form-control', 'placeholder'=> 'Výchozí sleva produktu výrobce']) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('default_sale_action_id','Výchozí sleva akčního produktu',['class'=> 'col-sm-3 control-label']) }}
    <div class="col-sm-9">
        {{ Form::select('default_sale_action_id',$select_sale, NULL, ['required' => 'required', 'class'=> 'form-control', 'placeholder'=> 'Výchozí sleva akčního produktu výrobce']) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('default_availability_id','Výchozí dostupnost',['class'=> 'col-sm-3 control-label']) }}
    <div class="col-sm-9">
        {{ Form::select('default_availability_id',$select_availability, NULL, ['required' => 'required', 'class'=> 'form-control', 'placeholder'=> 'Výchozí dostupnost pro výrobce']) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('transport_time_supplier','Čas dodání zboží do obchodu',['class'=> 'col-sm-3 control-label']) }}
    <div class="col-sm-9">
        {{ Form::number('transport_time_supplier', NULL ,['min'=>'1', 'max' => '99','class'=>'form-control','placeholder' => 'Čas dodání zboží do obchodu od dodavatele']) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('authorized','Autorizovaný prodejce',['class'=> 'col-sm-3 control-label']) }}
    <div class="col-sm-9">
        {{ Form::select('authorized',['0' => 'NE','1' => 'ANO'], NULL, ['class'=> 'form-control']) }}
    </div>
</div>
<p class="text-center">
    {{ link_to_route('adm.pattern.dev.index','Zobrazit všechny výrobce',NULL, ['class'=>'btn btn-primary','role'=> 'button']) }}
    {{ Form::submit('Editovat výrobce', ['class' => 'btn btn-info']) }}
</p>
{{ Form::close() }}
@stop
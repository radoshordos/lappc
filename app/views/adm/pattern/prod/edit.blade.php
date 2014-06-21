@extends('adm.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Editace produktu
@stop

{{-- Content --}}
@section('content')

{{ Form::model($prod, array('method'=>'PATCH','route' => array('adm.pattern.prod.update',$prod->id),'class'=>'form-horizontal','role'=>'form')) }}
<div class="form-group">
    {{ Form::label('tree_id','Skupina',array('class'=> 'col-sm-2 control-label')) }}
    <div class="col-sm-10">
        {{ Form::select('tree_id',$select_tree, NULL, array('required' => 'required', 'class'=> 'form-control')) }}
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
<p class="text-center">
    {{ link_to_route('adm.pattern.prod.index','Zobrazit všechny produkty',NULL, array('class'=>'btn btn-primary','role'=> 'button')) }}
    {{ Form::submit('Editovat produkt', array('class' => 'btn btn-info')) }}
</p>
{{ Form::close() }}
@stop
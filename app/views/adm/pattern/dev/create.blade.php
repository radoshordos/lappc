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
        {{ Form::input('number','id',NULL,array('min'=> '1','max'=> '999','required' => 'required','class'=> 'form-control', 'placeholder'=> '#ID určené pro výrobce')) }}
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
    {{ Form::label('default_sale_prod_id','Výchozí sleva produktu',array('class'=> 'col-sm-2 control-label')) }}
    <div class="col-sm-10">
        {{ Form::select('default_sale_prod_id',$select_sale, NULL, array('required' => 'required', 'class'=> 'form-control', 'placeholder'=> 'Výchozí sleva produktu výrobce')) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('default_sale_action_id','Výchozí sleva akčního produktu',array('class'=> 'col-sm-2 control-label')) }}
    <div class="col-sm-10">
        {{ Form::select('default_sale_action_id',$select_sale, NULL, array('required' => 'required', 'class'=> 'form-control', 'placeholder'=> 'Výchozí sleva akčního produktu výrobce')) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('default_sale_prod_id','Výchozí sleva',array('class'=> 'col-sm-2 control-label')) }}
    <div class="col-sm-10">
        {{ Form::select('default_sale_prod_id',$select_sale, NULL, array('required' => 'required', 'class'=> 'form-control', 'placeholder'=> 'Výchozí sleva pro výrobce')) }}
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
    {{ Form::label('authorized','Autorizovaný prodej',array('class'=> 'col-sm-2 control-label')) }}
    <div class="col-sm-10">
        {{ Form::select('authorized',['0' => 'NE','1' => 'ANO'], NULL, array('class'=> 'form-control')) }}
    </div>
</div>
<p class="text-center">
    {{ link_to_route('adm.pattern.dev.index','Zobrazit všechny výrobce',NULL, array('class'=>'btn btn-primary','role'=> 'button')) }}
    {{ Form::submit('Vložit nového výrobce', array('class' => 'btn btn-success')) }}
</p>
{{ Form::close() }}
@stop
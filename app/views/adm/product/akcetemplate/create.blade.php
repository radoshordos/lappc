@extends('adm.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Nová akční šablona
@stop

{{-- JavaScript on page --}}
@section ('script')
<script>
    $(document).ready(function () {
        $("#mixture_dev_id").select2({});
        $("#minitext_id").select2({});
        $("#availibility_id").select2({});
        $("#mixture_item_id").select2({});
    });
</script>
@stop

{{-- Content --}}
@section('content')
{{ Form::open(array('route' => 'adm.product.akcetemplate.store','class' => 'form-horizontal', 'role' => 'form')) }}
<div class="form-group">
    {{ Form::label('mixture_dev_id','Skupina výrobců',array('class'=> 'col-sm-3 control-label')) }}
    <div class="col-sm-9">
        {{ Form::select('mixture_dev_id',$select_mixture_dev, NULL, array('id' => 'mixture_dev_id','required' => 'required', 'class'=> 'form-control')) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('minitext_id','Minitext',array('class'=> 'col-sm-3 control-label')) }}
    <div class="col-sm-9">
        {{ Form::select('minitext_id',$select_minitext, NULL, array('id' => 'minitext_id','required' => 'required', 'class'=> 'form-control')) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('availibility_id','Platnost',array('class'=> 'col-sm-3 control-label')) }}
    <div class="col-sm-9">
        {{ Form::select('availibility_id',$select_availability, NULL, array('id' => 'availibility_id','required' => 'required', 'class'=> 'form-control')) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('endtime','Automatické zrušení akce po',array('class'=> 'col-sm-3 control-label')) }}
    <div class="col-sm-9">
        {{ Form::input('date','endtime',NULL,  array('required' => 'required', 'class'=> 'form-control')) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('bonus_title', 'Bonus titulek', array('class'=> 'col-sm-3 control-label')) }}
    <div class="col-sm-9">
        {{ Form::text('bonus_title', NULL, array('maxlength' => '32', 'class'=> 'form-control')) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('bonus_text', 'Bonus popisek', array('class'=> 'col-sm-3 control-label')) }}
    <div class="col-sm-9">
        {{ Form::textarea('bonus_text', NULL, ['size' => '90x5', 'class' => 'form-control' ]); }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('mixture_item_id','Skupina položek zdarma',['class'=> 'col-sm-3 control-label']) }}
    <div class="col-sm-9">
        {{ Form::select('mixture_item_id',$select_mixture_item, NULL, ['id' => 'mixture_item_id', 'class'=> 'form-control']) }}
    </div>
</div>

<p class="text-center">
    {{ link_to_route('adm.product.akcetemplate.index','Zobrazit všechny šablony akce', NULL, array('class'=>'btn btn-primary','role'=> 'button')) }}
    {{ Form::submit('Přidat novou šablonu akce', array('class' => 'btn btn-success')) }}
</p>
{{ Form::close() }}
@stop
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
        $("#availability_id").select2({});
        $("#mixture_item_id").select2({});
    });
</script>
@stop

{{-- Content --}}
@section('content')
{{ Form::open(['route' => 'adm.product.akcetemplate.store','class' => 'form-horizontal', 'role' => 'form']) }}
<div class="form-group">
    {{ Form::label('mixture_dev_id','Skupina výrobců',['class'=> 'col-sm-3 control-label']) }}
    <div class="col-sm-9">
        {{ Form::select('mixture_dev_id',$select_mixture_dev, NULL, ['id' => 'mixture_dev_id','required' => 'required', 'class'=> 'form-control']) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('minitext_id','Minitext',['class'=> 'col-sm-3 control-label']) }}
    <div class="col-sm-9">
        {{ Form::select('minitext_id',$select_minitext, NULL, ['id' => 'minitext_id','required' => 'required', 'class'=> 'form-control']) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('availability_id','Platnost',['class'=> 'col-sm-3 control-label']) }}
    <div class="col-sm-9">
        {{ Form::select('availability_id',$select_availability, NULL, ['id' => 'availability_id','required' => 'required', 'class'=> 'form-control']) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('endtime','Automatické zrušení akce po',['class'=> 'col-sm-3 control-label']) }}
    <div class="col-sm-9">
        {{ Form::input('date','endtime',NULL,  ['required' => 'required', 'class'=> 'form-control']) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('bonus_title', 'Bonus titulek', ['class'=> 'col-sm-3 control-label']) }}
    <div class="col-sm-9">
        {{ Form::text('bonus_title', NULL, ['maxlength' => '32', 'class'=> 'form-control']) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('bonus_text', 'Bonus popisek', ['class'=> 'col-sm-3 control-label']) }}
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
    {{ link_to_route('adm.product.akcetemplate.index','Zobrazit všechny šablony akce', NULL, ['class'=>'btn btn-primary','role'=> 'button']) }}
    {{ Form::submit('Přidat novou šablonu akce', ['class' => 'btn btn-success']) }}
</p>
{{ Form::close() }}
@stop
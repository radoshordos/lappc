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
        $("#select_mixture_dev").select2({});
        $("#select_minitext").select2({});
        $("#select_availability").select2({});
    });
</script>
@stop

{{-- Content --}}
@section('content')
{{ Form::open(array('route' => 'adm.product.akcetemplate.store','class' => 'form-horizontal', 'role' => 'form')) }}
<div class="form-group">
    {{ Form::label('mixture_dev_id','Skupina výrobců',array('class'=> 'col-sm-2 control-label')) }}
    <div class="col-sm-10">
        {{ Form::select('mixture_dev_id',$select_mixture_dev, NULL, array('required' => 'required', 'class'=> 'form-control')) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('minitext_id','Minitext',array('class'=> 'col-sm-2 control-label')) }}
    <div class="col-sm-10">
        {{ Form::select('minitext_id',$select_minitext, NULL, array('required' => 'required', 'class'=> 'form-control')) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('availibility_id','Platnost',array('class'=> 'col-sm-2 control-label')) }}
    <div class="col-sm-10">
        {{ Form::select('availibility_id',$select_availability, NULL, array('required' => 'required', 'class'=> 'form-control')) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('endtime','Zrušení akce po',array('class'=> 'col-sm-2 control-label')) }}
    <div class="col-sm-10">
        {{ Form::input('date','endtime',NULL,  array('required' => 'required', 'class'=> 'form-control')) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('bonus_title', 'Bonus titulek', array('class'=> 'col-sm-2 control-label')) }}
    <div class="col-sm-10">
        {{ Form::text('bonus_title', NULL, array('maxlength' => '32', 'class'=> 'form-control')) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('bonus_text', 'Bonus popisek', array('class'=> 'col-sm-2 control-label')) }}
    <div class="col-sm-10">
        {{ Form::textarea('bonus_text', NULL, ['size' => '90x5', 'class' => 'form-control' ]); }}
    </div>
</div>

<p class="text-center">
    {{ link_to_route('adm.product.akcetemplate.index','Zobrazit všechny šablony akce', NULL, array('class'=>'btn btn-primary','role'=> 'button')) }}
    {{ Form::submit('Přidat novou šablonu akce', array('class' => 'btn btn-success')) }}
</p>
{{ Form::close() }}
@stop
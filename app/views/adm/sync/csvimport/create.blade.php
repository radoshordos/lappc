@extends('adm.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Import .csv dat
@stop

{{-- Content --}}
@section('content')
<div class="form-group">
    {{ Form::label('template_id','Sablona',array('class'=> 'col-sm-2 control-label')) }}
    <div class="col-sm-10">
        {{ Form::select('template_id', $sync_template, NULL, array('required' => 'required', 'class'=> 'form-control'))
        }}
    </div>
</div>
<div class="form-group">
    <div class="col-sm-12">
        {{ Form::textarea('notes', null, ['size' => '80x20', 'class' => 'form-control']) }}
    </div>
</div>
@stop
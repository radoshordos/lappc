@extends('adm.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Home
@stop

{{-- Content --}}
@section('content')
<h3 class="text-center">Manual import</h3>
{{ Form::open(array('action' => 'adm.ppc.import.show','class'=>'form-horizontal','role'=>'form')) }}
<div class="form-group">
    <label for="'url-file" class="col-sm-2 control-label">Url</label>
    <div class="col-sm-10">
        {{ Form::url('url-file', null ,array('class'=>'form-control','placeholder' => 'Url')) }}
    </div>
</div>
<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        {{ Form::submit('Submit',array('class'=>'btn btn-default')) }}
    </div>
</div>
{{ Form::close() }}
@stop


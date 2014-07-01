@extends('adm.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
CSV EDIT
@stop

{{-- Content --}}
@section('content')
{{ Form::model($template, array('method'=>'PATCH','route' => array('adm.sync.template.update',$template->id),'class'=>'form-horizontal','role'=>'form')) }}


{{ Form::close() }}
@stop
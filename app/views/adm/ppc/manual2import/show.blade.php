@extends('adm.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Home
@stop

{{-- Content --}}
@section('content')
<h1>Manual import</h1>

{{ Form::open(array('url' => 'foo/bar', 'files' => true)) }}
    Form::file();
{{ Form::close() }}

@stop
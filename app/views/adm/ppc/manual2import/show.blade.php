@extends('adm.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Home
@stop

{{-- Content --}}
@section('content')
<h1>Manual import</h1>



{{ Form::open(array('action' => 'adm.Ppc2manual2import@show')) }}
{{ Form::url('url-file') }}
{{ Form::submit('Submit') }}
{{ Form::close() }}
@stop


@stop
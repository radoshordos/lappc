@extends('adm.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Runner
@stop

{{-- Content --}}
@section('content')
HI

@foreach ($runner as $run)
    {{ $run->command }}
@endforeach

@stop
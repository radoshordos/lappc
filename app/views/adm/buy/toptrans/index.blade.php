@extends('adm.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent Toptrans @stop

{{-- Content --}}
@section('content')

{{ Form::open(array('route' => 'adm.buy.toptrans.index','class' => 'form-horizontal', 'role' => 'form')) }}

<div class="row" style="margin-bottom: 5px">
    <div class="col-lg-6">
        <div class="input-group">
            {{ Form::text('zasilka',"9000036/001",array('required' => 'required', 'class'=> 'form-control', 'placeholder'=> 'Číslo zásilky')) }}
            <span class="input-group-btn">
            {{ Form::submit('Go!', array('class' => 'btn btn-success')) }}
            </span>
        </div>
    </div>
</div>

{{ Form::close() }}

@if ($data)
    {{ Form::textarea('data_input', iconv('windows-1250','utf-8',$data), ['size' => '80x32', 'class' => 'form-control' ]) }}
@endif

@stop
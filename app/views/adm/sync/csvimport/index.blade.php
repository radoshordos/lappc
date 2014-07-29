@extends('adm.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Import .csv dat
@stop

{{-- JavaScript on page --}}
@section ('script')
<script>
    $(document).ready(function () {
        $("#template_id").select2({});
    });
</script>
@stop

{{-- Content --}}
@section('content')

{{ Form::open(array('route' => 'adm.sync.csvimport.index','class' => 'form-horizontal', 'role' => 'form')) }}
<div class="form-group">
    {{ Form::label('template_id','Šablona',array('class'=> 'col-sm-2 control-label')) }}
    <p class="col-sm-10">
        {{ Form::select('template_id', $sync_template, $template_id, array('required' => 'required', 'class'=> 'form-control')) }}
    </p>
</div>
<div class="form-group">
    {{ Form::label('separator','Oddělovač sloupců',array('class'=> 'col-sm-2 control-label')) }}
    <div class="col-sm-10">
        <div class="btn-group" data-toggle="buttons">
            <label class="btn btn-default {{ ($separator == 'separator' || $separator == NULL ? 'active' : NULL) }}">
                {{ Form::radio('separator', 'semicolon',($separator == 'semicolon' ? 'true' : 'false') ); }}Středník
            </label>
            <label class="btn btn-default {{ ($separator == 'tab' ? 'active' : NULL) }}">
                {{ Form::radio('separator', 'tab',($separator == 'tab' ? 'true' : 'false')); }}Tabulátor
            </label>
        </div>
    </div>
</div>
<div class="form-group">
    <p class="col-sm-12">
        @if ($check== TRUE)
        {{ Form::textarea('data_input', $data_input, ['size' => '80x20', 'class' => 'form-control','readonly' => 'readonly']) }}
        @else
        {{ Form::textarea('data_input', $data_input, ['size' => '80x20', 'class' => 'form-control']) }}
        @endif
    </p>
</div>
<p class="text-center">
    {{ Form::submit('Validovat', array('name' => 'validate','class' => 'btn btn-success')) }}
</p>

@if ($check!= FALSE)
<p class="text-center">
    {{ Form::submit('Pokračovat', array('name' => 'next', 'class' => 'btn btn-success')) }}
</p>
@endif

{{ Form::close() }}

@stop
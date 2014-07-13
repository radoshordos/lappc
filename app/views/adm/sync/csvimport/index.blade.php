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
    <p class="col-sm-12">
        {{ Form::textarea('data_input', $data_input, ['size' => '80x20', 'class' => 'form-control']) }}
    </p>
</div>
<p class="text-center">
    {{ Form::submit('Provést akci', array('class' => 'btn btn-success')) }}
</p>

@if ($check!= FALSE)
<p class="text-center">
    {{ Form::submit('Pokračovat', array('class' => 'btn btn-success')) }}
</p>
@endif

{{ Form::close() }}

@stop
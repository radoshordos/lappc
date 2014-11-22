@extends('adm.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Import CSV dat
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
    {{ Form::label('template_id','Šablona',['class'=> 'col-sm-2 control-label']) }}
    <p class="col-sm-10">
        {{ Form::select('template_id', $sync_template, $template_id, ['required' => 'required', 'class'=> 'form-control']) }}
    </p>
</div>
<div class="form-group">
    <div class="col-md-6">
        {{ Form::label('separator','Oddělovač sloupců',array('class'=> 'col-sm-4 control-label')) }}
        <div class="btn-group" data-toggle="buttons">
            <label class="btn btn-default {{ ($separator == 'semicolon' ? 'active' : NULL) }}">
                {{ Form::radio('separator', 'semicolon',($separator == 'semicolon' ? 'true' : NULL) ); }}Středník
            </label>
            <label class="btn btn-default {{ ($separator == 'tab' ? 'active' : NULL) }}">
                {{ Form::radio('separator', 'tab',($separator == 'tab' ? 'true' : NULL)); }}Tabulátor
            </label>
        </div>
    </div>
    <div class="col-md-6">
        {{ Form::label('import_type','Typ importu',array('class'=> 'col-sm-4 control-label')) }}
        <div class="btn-group" data-toggle="buttons">
            <label class="btn btn-default {{ ($import_type == 'manualsync' ? 'active' : NULL) }}">
                {{ Form::radio('import_type', 'manualsync',($import_type == 'manualsync' ? 'true' : NULL) ); }}Synchronizace
            </label>
            <label class="btn btn-default {{ ($import_type == 'action' ? 'active' : NULL) }}">
               {{ Form::radio('import_type', 'action',($import_type == 'action' ? 'true' : NULL)); }}Akce
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
    @if ($check== FALSE)
    {{ Form::submit('Validovat', ['name' => 'validate','class' => 'btn btn-success']) }}
    @else
    {{ Form::submit('Pokračovat', ['name' => 'next', 'class' => 'btn btn-success']) }}
    @endif
    <nav>
         <ul class="pager">
            <li class="previous"><a href="{{ URL::route('adm.sync.template.index') }}"><span aria-hidden="true">&larr;</span> CSV šablony</a></li>
         </ul>
    </nav>
</p>
{{ Form::close() }}

@stop
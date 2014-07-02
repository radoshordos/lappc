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

<div class="panel panel-default">
    <!-- Default panel contents -->
    <div class="panel-heading">Panel heading</div>

    <!-- Table -->
    <table class="table">
        <thead>

        </thead>
        <tfoot>
        <div class="panel-footer">
            {{ Form::open(array('route' => 'adm.sync.templatem2ncolumn.store','class' => 'form-horizontal', 'role' => 'form')) }}
            <div class="input-group">
            <span class="input-group-btn">
                {{ Form::submit('Přidat pořadí sloupců',array('class' => 'btn btn-success')) }}
            </span>
                {{ Form::select('column_id', $select_column, NULL, array('required' => 'required', 'id'=> 'dev_id', 'class'=> 'form-control')) }}
                {{ Form::hidden('template_id',$template->id) }}
            </div>
            {{ Form::close() }}
        </div>
        </tfoot>

        <tbody>

        </tbody>
    </table>
</div>


@stop
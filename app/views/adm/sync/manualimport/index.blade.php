@extends('adm.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Sychnonizační manuální import
@stop

{{-- JavaScript on page --}}
@section ('script')
<script>
    $(document).ready(function () {
        $("#select_mddev").select2({
            allowClear: true,
        });
    });
</script>
@stop

{{-- Content --}}
@section('content')

{{ Form::open(['route' => ['adm.sync.manualimport.index'],'method' => 'GET','class' => 'form-horizontal', 'role' => 'form']) }}
<blockquote>
    <div class="row">
        <div class="col-xs-6">
            {{ Form::select('select_tree', [],  [], ['id'=> 'select_tree', 'class'=> 'form-control']) }}
        </div>
        <div class="col-xs-3">
            {{ Form::select('select_mddev',  $select_mddev,  $choice_mddev, ['id'=> 'select_mddev', 'class'=> 'form-control']) }}
        </div>
        <div class="col-xs-2">
            {{ Form::select('select_limit', ['20' => ' Limit 20','80' => 'Limit 80'], $choice_limit, ['id'=> 'select_limit', 'class'=> 'form-control']) }}
        </div>
        <div class="col-xs-1">
            {{ Form::submit('OK',['class'=> 'form-control']); }}
        </div>
    </div>
</blockquote>

@if ($data)
<table class="table table-striped table-bordered table-hover table-condensed">
    <thead>
        <tr>
            <th>Název výrobce</th>
            <th>Elementy</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $row)
        <tr>
            <td>{{  $row->id }}</td>
            <td>{{  $row->name }}</td>
            <td>{{  $row->dev_id }}</td>
            <td>{{  $row->code_prod }}</td>
            <td>{{  $row->code_ean }}</td>
            <td>{{  $row->price_standard }}</td>
            <td rowspan="2">{{ $row->img_source  }}</td>
        </tr>
        <tr>
            <td colspan="6" class="small">{{  $row->desc }}</td>
        <tr>
    @endforeach
    </tbody>
</table>
{{ Form::close() }}
<div class="text-center">{{ $data->appends(['select_mddev' => $choice_mddev,'select_limit' => $choice_limit])->links(); }}</div>
@endif
@stop
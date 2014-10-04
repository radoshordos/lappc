@extends('adm.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Hromadné akce
@stop

{{-- JavaScript on page --}}
@section ('script')
@stop

{{-- Content --}}
@section('content')
{{ Form::open(array('route' => array('adm.product.akcehuge.index'))) }}
<div class="input-group form-group">
    <span class="input-group-addon">Import</span>
    {{ Form::select('select_action_record',$select_action_record, $action_record, array('id' => 'select_action_record', 'class'=> 'form-control', 'onchange' => 'this.form.submit()')) }}
</div>
{{ Form::close() }}

<table class="table table-striped">
    @foreach($item_action as $row)
    <tr>
        <td><input type="checkbox" name="select[{{$row->id}}]" /></td>
        <td>{{ $row->code_prod }}</td>
        <td>{{ $row->name }}</td>
    </tr>
    @endforeach
</table>
@stop
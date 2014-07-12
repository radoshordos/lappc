@extends('adm.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Optimalizator .csv dat
@stop

{{-- Content --}}
@section('content')

{{ Form::open(array('route' => 'adm.tools.csvoptimal.index','class' => 'form-horizontal', 'role' => 'form')) }}
<div class="table-responsive">
    <table class="table">
        <thead>
        <tr>
            <td colspan="2">{{ Form::select('menu', $select_menu, $menu, array('required' => 'required', 'class'=> 'form-control')) }}</td>
        <tr>
        </thead>
        <tbody>
        <tr>
            <td>{{ Form::textarea('data_input', $data_input, ['size' => '90x20', 'class' => 'form-control' ]) }}</td>
            <td>{{ Form::textarea('data_output', $data_output, ['size' => '90x20', 'class' => 'form-control']) }}</td>
        </tr>
        <tr>
            <td>Lenght : <b>{{ strlen($data_input) }}</b></td>
            <td>Lenght : <b>{{ strlen($data_output) }}</b></td>
        </tr>
        <tr>
            <td colspan="2">{{ Form::textarea('data_bug', $data_bug, ['size' => '180x10', 'class' => 'form-control']) }}</td>
        <tr>
        </tbody>
    </table>
    <p class="text-center">
        {{ Form::submit('Provést akci', array('class' => 'btn btn-success')) }}
    </p>
</div>
{{ Form::close() }}

@stop
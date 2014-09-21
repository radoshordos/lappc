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
            <th colspan="2">Akce</th>
            <th>Parametr 1</th>
            <th>Parametr 2</th>
        </tr>
        <tr>
            <td colspan="2">{{ Form::select('menu', $select_menu, $menu, ['required' => 'required', 'class'=> 'form-control']) }}</td>
            <td>{{ Form::select('param1', ['1' => '[1]','2' => '[2]','3' => '[3]','4' => '[4]','5' => '[5]','6' => '[6]','7' => '[7]'], $param1 ,['required' => 'required', 'class'=> 'form-control']) }}</td>
            <td>{{ Form::select('param2', ['1' => '[1]','2' => '[2]','3' => '[3]','4' => '[4]','5' => '[5]','6' => '[6]','7' => '[7]'], $param2 ,['required' => 'required', 'class'=> 'form-control']) }}</td>
        <tr>
        </thead>
        <tbody>
        <tr>
            <td colspan="2">{{ Form::textarea('data_input', $data_input, ['size' => '90x20', 'class' => 'form-control' ]) }}</td>
            <td colspan="2">{{ Form::textarea('data_output', $data_output, ['size' => '90x20', 'class' => 'form-control']) }}</td>
        </tr>
        <tr>
            <td colspan="2">Lenght : <b>{{ strlen($data_input) }}</b></td>
            <td colspan="2">Lenght : <b>{{ strlen($data_output) }}</b></td>
        </tr>
        <tr>
            <td colspan="4">{{ Form::textarea('data_bug', $data_bug, ['size' => '180x10', 'class' => 'form-control']) }}</td>
        <tr>
        </tbody>
    </table>
    <p class="text-center">
        {{ Form::submit('Provést akci', array('class' => 'btn btn-success')) }}
    </p>
</div>
{{ Form::close() }}

@stop
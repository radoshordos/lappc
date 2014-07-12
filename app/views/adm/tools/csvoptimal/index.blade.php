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
            <td colspan="2">{{ Form::select('menu', $select_menu, null, array('required' => 'required', 'class'=> 'form-control')) }}</td>
        <tr>
        </thead>
        <tbody>
        <tr>
            <td>{{ Form::textarea('data_input', null, ['size' => '90x20', 'class' => 'form-control']) }}</td>
            <td>{{ Form::textarea('data_output', null, ['size' => '90x20', 'class' => 'form-control']) }}</td>
        </tr>
        <tr>
            <td>Lenght : <b>{{ count('') }}</b></td>
            <td>Lenght : <b>{{ count('') }}</b></td>
        </tr>
        <tr>
            <td colspan="2">{{ Form::textarea('bug_output', null, ['size' => '180x10', 'class' => 'form-control']) }}</td>
        <tr>
        </tbody>
    </table>
    <p class="text-center">
        {{ Form::submit('Provést akci', array('class' => 'btn btn-success')) }}
    </p>
</div>
{{ Form::close() }}

@stop
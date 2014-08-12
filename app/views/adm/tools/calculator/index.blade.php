@extends('adm.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Kalkulačka Hash & Timeint
@stop

{{-- Content --}}
@section('content')
{{ Form::open(array('route' => 'adm.tools.calculator.index','class' => 'form-horizontal', 'role' => 'form')) }}
<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <table class="table table-striped table-hover">
            <tbody>
                <tr>
                    <th>{{ Form::label('inputstr', 'String'); }}</th>
                    <td>{{ Form::text('inputstr', $inputstr, array('maxlength' => '60', 'class'=> 'form-control')) }}</td>
                </tr>
                <tr>
                    <td colspan="2" class="text-center">{{ Form::submit('Vypočítat', array('class' => 'btn btn-info')) }}</td>
                </tr>
                <tr>
                    <th>{{ Form::label('md5', 'MD5:'); }}</th>
                    <td>{{ Form::text('md5', $md5, array("readonly" => "readonly",'class'=> 'form-control')) }}</td>
                </tr>
                <tr>
                    <th>{{ Form::label('sha1', 'SHA1:'); }}</th>
                    <td>{{ Form::text('sha1', $sha1, array("readonly" => "readonly",'class'=> 'form-control')) }}</td>
                </tr>
                <tr>
                    <th>{{ Form::label('timedate', 'Datum:'); }}</th>
                    <td>{{ Form::text('timedate', $timedate, array("readonly" => "readonly",'class'=> 'form-control')) }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
{{ Form::close() }}
@stop
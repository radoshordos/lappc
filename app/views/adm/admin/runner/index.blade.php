@extends('adm.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Runner
@stop

{{-- Content --}}
@section('content')

<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>AUTORUN</th>
                    <th>Alias</th>
                    <th>Commnad</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($runner as $run)
            <tr>
                <td>
                {{ Form::select('animal', array('0' => 'NE','1' => 'ANO'), $run->autorun) }}
                </td>
                <td>{{ $run->alias }}</td>
                <td>{{ $run->namespace }}</td>
                <td>{{ $run->class }}</td>
                <td><button class="btn btn-primary" onClick="location.href='{{ URL::to('adm/admin/runner',$run->alias) }}'">{{ $run->alias }}</button></td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>

</div>
@stop
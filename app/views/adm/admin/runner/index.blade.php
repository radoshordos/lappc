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

        {{ Form::open(array('route' => 'adm.admin.runner.task', 'method' => 'GET')) }}
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th>
                    <span class="glyphicon glyphicon-check"></span>
                </th>
                <th>AUTORUN</th>
                <th>Execute Manual Task</th>
                <th>RUN</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($runner as $run)
            <tr>
                <td>{{ Form::checkbox('alias['.$run->id.']', $run->alias); }}</td>
                <td>
                    {{ Form::select('autorun['.$run->id.']', array('0' => 'NE','1' => 'ANO'), $run->autorun) }}
                </td>
                <td>{{ $run->class }}</td>
                <td>
                    <button class="btn btn-primary btn-xs" onClick="location.href='{{ URL::to('adm/admin/runner',$run->alias) }}'">RUN</button>
                </td>
            </tr>
            @endforeach
            </tbody>
            <tfoot>
            <tr>
                <td colspan="4">
                    {{ Form::submit('Spustit vše zaškrtnuté', array('class' => 'btn btn-primary btn-xs')) }}
                </td>
            </tr>
            </tfoot>
        </table>
        {{ Form::close() }}
    </div>

</div>
@stop
@extends('adm.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Runner
@stop

{{-- Content --}}
@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        {{ Form::open(array('action' => 'CommandRunnerController@task', 'method' => 'POST')) }}
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th rowspan="2">
                    <span class="glyphicon glyphicon-check"></span>
                </th>
                <th rowspan="2"></th>
                <th colspan="2">AUTORUN</th>
                <th rowspan="2">Manuálně</th>
                <th rowspan="2">Execute Manual Task</th>
                <th rowspan="2">RUN</th>

            </tr>
            <tr>
                <th>Minule</th>
                <th>Příště nejdříve</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($runner as $run)
            <tr>
                <td>{{ Form::checkbox('alias['.$run->id.']', $run->alias); }}</td>
                <td>
                    {{ Form::select('autorun['.$run->id.']', array('0' => 'NE','1' => 'ANO'), $run->autorun) }}
                </td>
                <td>{{ date("d.m.Y H:i", $run->last_run_automatic) }} </td>
                <td>{{ date("d.m.Y H:i", $run->last_run_automatic + $run->autorun_minimim_range) }} </td>
                <td>{{ date("d.m.Y H:i", $run->last_run_manual) }} </td>
                <td>{{ str_replace('Authority\\Runner\\Task\\', '', $run->class)  }}</td>
                <td>
                    <input type="submit" formmethod="GET" formaction="{{ URL::action('CommandRunnerController@task',$run->id) }}" value="RUN" class="btn btn-primary btn-xs" />
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
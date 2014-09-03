@extends('adm.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Comparátor dat
@stop

{{-- Content --}}
@section('content')
{{ Form::open(array('route' => 'adm.tools.comparator.index','class' => 'form-horizontal', 'role' => 'form')) }}
<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <table class="table table-striped table-hover">
            <tbody>
                <tr>
                    <td>{{ Form::textarea('one', $one, ['size' => '90x15', 'class' => 'form-control' ]) }}</td>
                    <td>{{ Form::textarea('two', $two, ['size' => '90x15', 'class' => 'form-control']) }}</td>
                </tr>
                <tr>
                    <th class="text-center">Diff</th>
                    <th class="text-center">Intersect</th>
                </tr>
                <tr>
                    <td>{{ Form::textarea('diff', $diff, ['size' => '90x15', 'class' => 'form-control' ]) }}</td>
                    <td>{{ Form::textarea('intersect', $intersect, ['size' => '90x15', 'class' => 'form-control']) }}</td>
                </tr>
                <tr>
                    <th class="text-center">Řádků: <b>{{ intval($diff_count) }}</b></th>
                    <th class="text-center">Řádků: <b>{{ intval($intersect_count) }}</b></th>
                </tr>
            </tbody>
        </table>
        <p class="text-center">
            {{ Form::submit('Porovnat data', array('class' => 'btn btn-success')) }}
        </p>
    </div>
</div>
{{ Form::close() }}
@stop
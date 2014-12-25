@extends('adm.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Zakoupené zboží
@stop

{{-- JavaScript on page --}}
@section ('script')
    <script>
        $(document).ready(function () {
            $("#select_mixture_dev").select2({
                allowClear: true
            });
        });
    </script>
@stop

{{-- Content --}}
@section('content')
    {{ Form::open(['route' => ['adm.stats.orderitems.index'], 'method' => 'GET', 'class' => 'form-horizontal', 'role' => 'form']) }}
        <table class="table">
            <thead>
                <tr>
                    <th class="col-sm-3">{{ Form::label('day-start', 'Od dne') }}</th>
                    <th class="col-sm-3">{{ Form::label('day-end', 'Do dne') }}</th>
                    <th>{{ Form::label('select_mixture_dev', 'Výrobce') }}</th>
                    <th>{{ Form::submit('Zobrazit',['name' => 'submit-month-record','class' => 'btn btn-success']) }}</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ Form::input('date', 'day-start', NULL, ['class' => 'form-control', 'min' => $min_insert_month]);  }}</td>
                    <td>{{ Form::input('date', 'day-end', NULL, ['class' => 'form-control', 'max' => $max_insert_month]);  }}</td>
                    <td colspan="2">{{ Form::select('select_mixture_dev',$select_mixture_dev, $choice_mixture_dev, ['class'=> 'form-control', 'id' => 'select_mixture_dev']) }}</td>
                </tr>
            </tbody>
        </table>
    </form>
    {{ Form::close() }}
@stop
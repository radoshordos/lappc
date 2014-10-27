@extends('adm.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Uživatelé hledají
@stop

{{-- Content --}}
@section('content')
<table class="table table-bordered table-striped table-condensed table-hover">
    <thead>
        <tr>
            <th class="text-center">#ID</th>
            <th>Datum a čas</th>
            <th>Hledaný výraz</th>
            <th>Počet produktů</th>
            <th>Počet výrobců</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
             <td colspan="5" class="text-right">Zobrazeno : <strong><?= count($recordvisitors) ?></strong> výsledků</td>
        </tr>
    </tfoot>
    <tbody>
        @foreach ($recordvisitors as $row)
        <tr>
            <td>{{ $row->id; }}</td>
            <td>{{ $row->find_at; }}</td>
            <td>{{ $row->filter_find; }}</td>
            <td>{{ $row->count_prod; }}</td>
            <td>{{ $row->count_dev; }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@stop
@extends('adm.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Výrobci ve skupinách
@stop

{{-- Content --}}
@section('content')
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Skupina</th>
                <th><span title="Zanoření" class="glyphicon glyphicon-road"></span></th>
                <th>DEV</th>
                <th>
                    <span title="Aktuální složka a podsložky, všechny produkty" class="glyphicon glyphicon-asterisk"></span>
                </th>
                <th>
                    <span title="Aktuální složka a podsložky, jen viditelné produkty" class="glyphicon glyphicon-eye-open"></span>
                </th>
                <th>
                    <span title="Aktuální složka, všechny produkty" class="glyphicon glyphicon-asterisk"></span>
                </th>
                <th>
                    <span title="Aktuální složka, jen viditelné produkty" class="glyphicon glyphicon-eye-open"></span>
                </th>
            </tr>
            </thead>
            <tfoot>
            <tr>
                <td colspan="7" class="active text-right">Počet záznamů: <b>{{ count($treedev) }}</b></td>
            </tr>
            </tfoot>
            <tbody>
            @foreach ($treedev as $row)
            @if ($row->dev_id == 1)
            <tr class='success'>
                @else
            <tr class='info'>
                @endif
                <td>@if (isset($row->tree->name) && $row->dev_id == 1) {{ $row->tree->name }} @endif</td>
                <td>@if (isset($row->tree->deep) && $row->dev_id == 1) {{ $row->tree->deep }} @endif</td>
                <td>{{ $row->dev->name }}</td>
                <td>{{ $row->subdir_all }}</td>
                <td>{{ $row->subdir_visible }}</td>
                <td>{{ $row->dir_all }}</td>
                <td>{{ $row->dir_visible }}</td>
            </tr>
            @endforeach
            <tbody>
        </table>
    </div>
</div>
@stop
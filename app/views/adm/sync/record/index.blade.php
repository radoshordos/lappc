@extends('adm.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Záznamy importů
@stop

{{-- Content --}}
@section('content')
<table class="table">
    <thead>
        <tr>
            <th>Import proběhl</th>
            <th>Název</th>
            <th>Seskupení výrobců</th>
            <th>Účel</th>
            <th colspan="2">Položek / Aktivních</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($record as $row)
    <tr>
        <td>{{ $row->created_at }}</td>
        <td>{{ $row->name }}</td>
        <td>{{ isset($row->syncCsvTemplate->mixtureDev->name) ? $row->syncCsvTemplate->mixtureDev->name : NULL }}</td>
        <td>{{ $row->purpose }}</td>
        <td>{{ $row->item_counter_insert }}</td>
        @if ($row->rsi_actual_count > 0)
        <td>{{ link_to_route('adm.sync.db.index', $row->rsi_actual_count, ["select_connect" => "code_prod", "join" => "inner", "limit" => 20, "record" => $row->id  ]) }}</td>
        @else
        <td>{{ $row->rsi_actual_count }}</td>
        @endif
    </tr>
    @endforeach
    </tbody>
</table>
@stop

































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
            <th>Položek / Aktivních</th>

        </tr>
    </thead>
    <tbody>
    @foreach ($record as $row)
    <tr>
        <td>{{ $row->created_at }}</td>
        <td>{{ $row->name }}</td>
        <td>{{ isset($row->syncCsvTemplate->mixtureDev) ? $row->syncCsvTemplate->mixtureDev->name : NULL }}</td>
        <td>{{ $row->purpose }}</td>
        <td>{{ $row->item_counter }} / {{ $row->rsi_actual_count }}</td>
    </tr>
    @endforeach
    </tbody>
</table>
@stop
@extends('adm.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Přehled synchronizace výrobců
@stop

{{-- Content --}}
@section('content')
    <table class="table">
        <thead>
            <th>#ID</th>
            <th>Výrobce</th>
            <th>Zbývá vložit</th>
            <th>ALL SyncDB</th>
        </thead>
        <tbody>
        @foreach($summary as $row)
            <tr>
                <td>{{ $row->dev_id }}</td>
                <td>{{ $row->dev_name }}</td>
                <td>{{ $row->count_items_dev - $row->count_insert_prod }}</td>
                <td>{{ $row->count_items_dev }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@stop
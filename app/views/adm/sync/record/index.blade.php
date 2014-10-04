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
            <th>Seskupení výrobců</th>
            <th>Účel</th>
            <th>Položek</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($record as $row)
    <tr>
        <td>{{ $row->created_at }}</td>
        <td>{{ $row->syncCsvTemplate->mixtureDev->name }}</td>
        <td>{{ $row->purpose }}</td>
        <td>{{ $row->item_counter }}</td>
    </tr>
    @endforeach
    </tbody>
</table>
@stop
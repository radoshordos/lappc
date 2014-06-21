@extends('adm.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Přehled produktů
@stop

{{-- Content --}}
@section('content')
@if ($prod->count())
<div class="row">
    <div class="col-md-12">
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th>#ID</th>
                <th>#DEV</th>
                <th>#TREE</th>
                <th>#Záruka</th>
                <th>Nazev</th>
                <th>Cena</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($prod as $row)
            <tr>

                <td>{{ $row->id }}</td>
                <td>{{ $row->dev_id }}</td>
                <td>{{ $row->tree_id }}</td>
                <td>{{ $row->warranty_id }}</td>
                <td>{{ link_to_route('adm.pattern.prod.edit',$row->name,array($row->id)) }}</td>
                <td>{{ $row->price }}</td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endif
@stop
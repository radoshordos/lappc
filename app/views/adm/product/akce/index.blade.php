@extends('adm.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Přehled akcí
@stop

{{-- JavaScript on page --}}
@section ('script')
@stop

{{-- Content --}}
@section('content')
@if ($akce->count())
<div class="row">
    <div class="col-md-12">
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th><span class="glyphicon glyphicon-lock" title="Šablona akce"></span></th>
                <th>Název</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($akce as $row)
            <tr>
                <td>{{ $row->template_id }}</td>
                <td>{{ link_to_route('adm.product.akce.edit',implode(' + ', ($row->bonus_title) ? [$row->name,$row->bonus_title] : [$row->name]),array($row->prod_id)) }}</td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endif
@stop
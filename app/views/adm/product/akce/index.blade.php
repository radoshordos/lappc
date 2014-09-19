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
                <th>Minitext</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($akce as $row)
            <tr>
                <td>{{ $row->akce_template_id }}</td>
                <td>{{ link_to_route('adm.product.akce.edit',implode(' + ', ($row->akce_template_bonus_title) ? [$row->prod_name,$row->akce_template_bonus_title] : [$row->prod_name]),array($row->prod_id)) }}</td>
                <td>{{ $row->akce_minitext_name }}</td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endif
@stop
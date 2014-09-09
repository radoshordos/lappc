@extends('adm.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Záruka produktů
@stop

{{-- Content --}}
@section('content')
@if (count($pw)>0)
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th>#ID</th>
                <th>Text</th>
                <th>Záruka v měsících</th>
                <th>Produktů &#x2211;</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($pw as $row)
            <tr>
                <td>{{ $row->id }}</td>
                <td>{{ $row->name }}</td>
                <td>{{ $row->warranty_month }}</td>
                <td>{{ $row->warranty_count }}</td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endif
<p class="text-center">
    {{ link_to_route('adm.pattern.prodwarranty.create','Přidat novou záruku',NULL, array('class'=>'btn btn-success','role'=> 'button')) }}
</p>
@stop
@extends('adm.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Správa akční platnosti akce
@stop

{{-- JavaScript on page --}}
@section ('script')
@stop

{{-- Content --}}
@section('content')
@if (count($aa)>0)
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th>Text</th>
                <th>Šablon &#x2211;</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($aa as $row)
            <tr>
                <td>{{ $row->name }}</td>
                <td>{{ $row->template_count }}</td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endif
<p class="text-center">
{{ link_to_route('adm.product.akceavailability.create','Přidat novou platnost akce',NULL, array('class'=>'btn btn-success','role'=> 'button')) }}
</p>
@stop
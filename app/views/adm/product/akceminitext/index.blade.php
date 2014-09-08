@extends('adm.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Správa akčního minitextu
@stop

{{-- JavaScript on page --}}
@section ('script')
@stop

{{-- Content --}}
@section('content')

@if (count($am))
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
            @foreach ($am as $row)
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
{{ link_to_route('adm.product.akceminitext.create','Přidat nový minitext',NULL, array('class'=>'btn btn-success','role'=> 'button')) }}
</p>
@stop
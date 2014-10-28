@extends('adm.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Sychnonizační manuální import
@stop

{{-- Content --}}
@section('content')

@if ($data)
<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th>Název výrobce</th>
                <th>Elementy</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach ($data as $row)
            <tr>
                <td>}</td>
                <td></td>
                <td></td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endif
@stop
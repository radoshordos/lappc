@extends('adm.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
GRAB
@stop

{{-- Content --}}
@section('content')
<table class="table">
    <thead>
        <tr>
            <th>Znaková sada</th>
            <th>Název skupiny</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <td colspan="3" class="center">{{ Form::submit('Vypočítat', array('class' => 'btn btn-info')) }}</td>
        </tr>
    </tfoot>
    <tbody>
        <tr>
            <td></td>
            <td>{{ Form::text('name', NULL, array("size" => "24", "maxlength" => "32","required" => "required",'class'=> 'form-control')) }}</td>
        </tr>
    </tbody>
</table>

@stop
@extends('adm.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent Správa objednávek @stop

{{-- Content --}}
@section('content')
    @if(!empty($bodc))
        <table class="table">
            <tr>
                <th>#</th>
                <th>Datum</th>
                <th>Jméno</th>
            </tr>
            @foreach($bodc as $row)
                <tr>
                    <td>{{ $row->bod_id.date('md',strtotime($row->bod_created_at))  }}</td>
                    <td>{{ $row->bod_created_at }}</td>
                    <td>{{ $row->bodc_customer_fullname }}</td>
                </tr>
            @endforeach
        </table>
    @endif
@stop
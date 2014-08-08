@extends('adm.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Záznamy importů
@stop

{{-- Content --}}
@section('content')
<table class="table">
    @foreach ($record as $row)
    <tr>
        <td>{{ $row->created_at }}</td>
    </tr>
    @endforeach
</table>
@stop
@extends('adm.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Záznamy importů
@stop

{{-- Content --}}
@section('content')
<table class="table">
    <tr>
        @foreach ($record as $row)
        <td>{{ $row->created_at }}</td>
        @endforeach
    </tr>
</table>
@stop
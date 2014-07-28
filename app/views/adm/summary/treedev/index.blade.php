@extends('adm.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Výrobci ve skupinách
@stop

{{-- Content --}}
@section('content')
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <table class="table table-hover">
            @foreach ($treedev as $row)
                @if ($row->dev_id == 1)
                <tr class='info'>
                    @else
                <tr class='success'>
                    @endif
                <td>{{ $row->tree->name }}</td>
                <td>{{ $row->dev->name }}</td>
                <td>{{ $row->subdir_all }}</td>
                <td>{{ $row->subdir_visible }}</td>
                <td>{{ $row->dir_all }}</td>
                <td>{{ $row->dir_visible }}</td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
@stop
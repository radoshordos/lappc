@extends('adm.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Seznam XML Feedů
@stop

{{-- Content --}}
@section('content')

@if ($feed->count())
<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <table class="table table-striped table-hover table-bordered">
            <thead>
            <tr>
                <th>#ID</th>
                <th>Class</th>
                <th>Název souboru</th>
                <th>Spuštění</th>
                <th>URL</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($feed as $row)
            <tr>
                <td>{{ $row->id }}</td>
                <td>{{ $row->class }}</td>
                <td>{{ $row->filename }}</td>
                <td>{{ URL::route('web.home').'/feeds/'.$row->execute  }}</td>
                <td>{{ URL::route('web.home').'/feeds/'.$row->filename  }}</td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endif
@stop
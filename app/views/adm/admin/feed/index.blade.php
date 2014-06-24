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
    <div class="col-md-6 col-md-offset-3">
        <table class="table table-striped table-hover table-bordered">
            <thead>
            <tr>
                <th>#ID</th>
                <th>Typ</th>
                <th>Název souboru</th>
                <th>URL</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($feed as $row)
            <tr>
                <td>{{ link_to_route('adm.admin.feed.edit',$row->id,array($row->id)) }}</td>
                <td>{{ $row->feed_type->code }}</td>
                <td>{{ $row->filename }}</td>
                <td>{{ URL::route('home').'/feeds/'.$row->filename  }}</td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endif
@stop
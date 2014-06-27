@extends('adm.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Import z XML Feed
@stop

{{-- Content --}}
@section('content')

{{ Form::open(array('method'=>'GET','route' => array('adm.ppc.db.index',http_build_query($get)),'class'=>'form-horizontal','role'=>'form')) }}

<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <table class="table table-striped table-hover">
            <tbody>
            <tr>
                <td>{{ Form::input('search','name', (isset($get['name']) ? $get['name'] : NULL),array('class' => 'form-control','placeholder' => 'Text input')) }}</td>
                <td>{{ Form::submit('GET'); }}</td>
            </tr>
            </tbody>
        </table>
    </div>
</div>

{{ Form::close() }}
@if ($ppcdb->count())
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th>#</th>
                <th>name <br/></th>
                <th>price</th>
                <th>Prodej</th>
                <th>Akce</th>
                <th>K zaslání</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($ppcdb as $db)
            <tr>
                <td>{{ $db->id }}</td>
                <td>{{ $db->name }}</td>
                <td>{{ $db->price }}</td>
                <td>{{ ($db->market ? 'ANO' : 'NE') }}</td>
                <td>{{ ($db->action ? 'ANO' : 'NE') }}</td>
                <td>{{ ($db->send ? 'ANO' : 'NE') }}</td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>

@else
<p class="text-center">Je tu prázdno !!!</p>
@endif

@stop
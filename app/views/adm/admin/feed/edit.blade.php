@extends('adm.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Zobrazování položek feedů
@stop

{{-- Content --}}
@section('content')
{{ Form::model($feed, array('method' => 'PATCH','route' => array('adm.admin.feed.update',$feed->id),'class' => 'form-horizontal','role' => 'form')) }}

<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <table class='table table-hover'>
            <thead class="">
            <tr>
                <th>TAG</th>
                <th>Používat</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($values as $row)
            <tr>
                <td>{{ $row->feedColumn->name }}</td>
                <td><?= Form::select("value[".$row->feedColumn->id."]", ['0' => 'NE', '1' => 'ANO'], $row->value, array('class' => 'form-control')) ?></td>
            </tr>
            @endforeach
            </tbody>
        </table>
        <p class="text-center">
            {{ link_to_route('adm.admin.feed.index','Zpět',NULL, array('class'=>'btn btn-primary','role'=> 'button')) }}
            {{ Form::submit('Změnit', array('class' => 'btn btn-info', 'style' => 'margin: 0 5em')) }}
        </p>
    </div>
</div>
{{ Form::close() }}
@stop
@extends('adm.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Grupy produktů
@stop

{{-- Content --}}
@section('content')
@if ($mixtureprod->count())
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th>#</th>
                <th>Název gruopy</th>
                <th>Produkty v grupě</th>
                <th><button type="button" title="Suma produktů v grupě" class="btn btn-primary btn-xs">&#8721;</button></th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach ($mixtureprod as $row)
            <tr>
                <td>{{ $row->id }}</td>
                <td>{{ $row->name }}</td>
                <td>@foreach ($row->prod as $one) {{ '<p>'.$one->name.'</p>'; }} @endforeach</td>
                <td>{{ $row->trigger_column_count }}</td>
                <td>@if ($row->purpose != 'autosimple') {{ link_to_route('adm.pattern.mixtureprod.edit','Edit',array($row->id),array('class' => 'btn btn-info btn-xs')) }} @endif</td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endif
<p class="text-center">
    {{ link_to_route('adm.pattern.mixtureprod.create','Přidat novou grupu produktů',NULL, array('class'=>'btn btn-success','role'=> 'button')) }}
</p>
@stop
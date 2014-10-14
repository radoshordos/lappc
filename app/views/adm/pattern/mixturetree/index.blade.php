@extends('adm.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Grupy skupin
@stop

{{-- Content --}}
@section('content')
{{-- Content --}}
@section('content')
@if ($mixturetree->count())
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th>#</th>
                <th>Název skupiny</th>
                <th>Výrobci ve skupině</th>
                <th><button type="button" title="Suma výrobců v seskupení" class="btn btn-primary btn-xs">&#8721;</button></th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach ($mixturedev as $row)
            <tr>
                <td>{{ $row->id }}</td>
                <td>{{ $row->name }}</td>
                <td>@foreach ($row->tree as $one) {{ '<p>'.$one->name.'</p>'; }} @endforeach</td>
                <td>{{ $row->trigger_column_count }}</td>
                <td>{{ link_to_route('adm.pattern.mixturedev.edit','Edit',array($dev->id),array('class' => 'btn btn-info btn-xs')) }}</td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endif
<p class="text-center">
    {{ link_to_route('adm.pattern.mixturetree.create','Přidat novou grupu skupin',NULL, array('class'=>'btn btn-success','role'=> 'button')) }}
</p>
@stop
@stop
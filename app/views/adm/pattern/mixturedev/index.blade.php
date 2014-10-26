@extends('adm.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Skupiny výrobců
@stop

{{-- Content --}}
@section('content')
@if ($mixturedev->count())
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th>#</th>
                <th>Název grupy</th>
                <th>Výrobci v grupě</th>
                <th><button type="button" title="Suma výrobců v grupě" class="btn btn-primary btn-xs">&#8721;</button></th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach ($mixturedev as $dev)
            <tr>
                <td>{{ $dev->id }}</td>
                <td>{{ $dev->name }}</td>
                <td>@foreach ($dev->dev as $one) {{ '<p>'.$one->name.'</p>'; }} @endforeach</td>
                <td>{{ $dev->trigger_column_count }}</td>
                <td>@if ($dev->purpose != 'autosimple') {{ link_to_route('adm.pattern.mixturedev.edit','Edit',array($dev->id),array('class' => 'btn btn-info btn-xs')) }} @endif</td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endif
<p class="text-center">
    {{ link_to_route('adm.pattern.mixturedev.create','Přidat novou grupu výrobců',NULL, array('class'=>'btn btn-success','role'=> 'button')) }}
</p>
@stop
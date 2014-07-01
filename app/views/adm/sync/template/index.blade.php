@extends('adm.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Přehled .csv šablon
@stop

{{-- Content --}}
@section('content')

@if ($template->count())
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th>Název výrobce</th>
                <th>Alias</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach ($template as $row)
            <tr>
                <td>{{ $row->mixtureDev->name }}</td>
                <td>{{ $row->purpose }}</td>
                <td>{{ link_to_route('adm.sync.template.edit','Nastavit',array($row->id),array('class' => 'btn btn-info btn-xs')) }}</td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endif

<p class="text-center">
    {{ link_to_route('adm.sync.template.create','Založit novou .csv šablonu',NULL, array('class'=>'btn btn-success','role'=> 'button')) }}
</p>

@stop
@extends('adm.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Přehled .csv šablon
@stop

{{-- Content --}}
@section('content')

@if ($template)
<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th>Název výrobce</th>
                <th>Elementy</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach ($template as $row)
            <tr>
                <td>{{ $row->mixtureDev->name }}</td>
                <td>{{ htmlspecialchars($tag[$row->id]) }}</td>
                <td>{{ link_to_route('adm.sync.template.edit','Nastavit',[$row->id], ['class' => 'btn btn-info btn-xs']) }}</td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endif

<p class="text-center">
    {{ link_to_route('adm.sync.template.create','Založit novou .csv šablonu',NULL, array('class'=>'btn btn-success','role'=> 'button')) }}
    <nav>
        <ul class="pager">
            <li class="next"><a href="{{ URL::route('adm.sync.csvimport.index') }}">Import CSV dat <span aria-hidden="true">&rarr;</span></a></li>
        </ul>
    </nav>
</p>
@stop
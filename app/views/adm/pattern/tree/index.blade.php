@extends('adm.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Skupiny zboží
@stop

{{-- Content --}}
@section('content')
@if ($trees->count())
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th>#</th>
                <th>Rodič</th>
                <th>Name</th>
                <th>Desc</th>
                <th>Relative</th>
                <th><span class="glyphicon glyphicon-edit"></span></th>
            </tr>
            </thead>
            <tbody>
            @foreach ($trees as $tree)
            <tr>
                <td>{{ $tree->id }}</td>
                <td>{{ $tree->parent_id }}</td>
                <td>{{ $tree->name }}</td>
                <td>{{ $tree->desc }}</td>
                <td>{{ $tree->relative }}</td>
                <td>{{ link_to_route('adm.pattern.tree.edit','Edit',array($tree->id),array('class' => 'btn btn-info btn-xs')) }}</td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endif
<p class="text-center">
    {{ link_to_route('adm.pattern.tree.create','Přidat novou skupinu',NULL, array('class'=>'btn btn-success','role'=> 'button')) }}
</p>
@stop
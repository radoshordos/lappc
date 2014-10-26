@extends('adm.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Grupy položek
@stop

{{-- Content --}}
@section('content')
@if ($mixtureitem->count())
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th>#</th>
                <th>Název grupy</th>
                <th>Položky v grupě</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach ($mixtureitem as $row)
            <tr>
                <td>{{ $row->id }}</td>
                <td>{{ $row->name }}</td>
                <td>@foreach ($row->items as $one) {{ '<p>'.$one->id.'</p>'; }} @endforeach</td>
                <td>{{ link_to_route('adm.pattern.mixtureitem.edit','Edit', [$row->id],['class' => 'btn btn-info btn-xs']) }}</td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endif
<p class="text-center">
    {{ link_to_route('adm.pattern.mixtureitem.create','Přidat novou grupu položek',NULL, ['class'=>'btn btn-success','role'=> 'button']) }}
</p>
@stop
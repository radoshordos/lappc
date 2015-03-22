@extends('adm.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Skupiny výrobců
@stop

{{-- Content --}}
@section('content')
{{ Form::open(['route' => ['adm.pattern.mixturedev.index'],'method' => 'GET','class' => 'form-horizontal', 'role' => 'form']) }}
<blockquote>
    <div class="row">
		<div class="col-xs-8">
            {{ Form::select('select_purpose_all', $select_purpose_all, $choice_purpose_all, ['id'=> 'select_purpose_all', 'class'=> 'form-control', 'onchange' => 'this.form.submit()']) }}
        </div>
        <div class="col-xs-2">
            {{ Form::select('select_limit', ['20' => ' Limit 20','30' => ' Limit 30','90' => 'Limit 90'], $choice_limit, ['id'=> 'select_limit', 'class'=> 'form-control', 'onchange' => 'this.form.submit()']) }}
        </div>
        <div class="col-xs-2">
            {{ link_to_route('adm.pattern.mixturedev.create','Nová skupina výrobců', NULL, ['class'=>'btn btn-success','role'=> 'button']) }}
        </div>
	</div>
</blockquote>
{{ Form::close() }}

@if ($mixturedev->count())
<div class="row">
	<table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>Účel</th>
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
                <td>{{ $dev->purpose }}</td>
                <td>{{ $dev->name }}</td>
                <td>@foreach ($dev->dev as $one) {{ '<p>'.$one->id." - ".$one->name.'</p>'; }} @endforeach</td>
                <td>{{ $dev->trigger_column_count }}</td>
                <td>@if ($dev->purpose != 'autosimple') {{ link_to_route('adm.pattern.mixturedev.edit','Edit',[$dev->id],['class' => 'btn btn-info btn-xs']) }} @endif</td>
            </tr>
            @endforeach
   		</tbody>
    </table>
</div>
@endif
@stop
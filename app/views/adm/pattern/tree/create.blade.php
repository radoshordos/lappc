@extends('adm.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Přidání nové skupiny zboží
@stop

{{-- Content --}}
@section('content')
{{ Form::open(array('route' => 'adm.pattern.tree.store','class' => 'form-horizontal', 'role' => 'form')) }}

<div class="form-group">
    {{ Form::label('group_id','Výchozí dostupnost',array('class'=> 'col-sm-2 control-label')) }}
    <div class="col-sm-10">
        {{ Form::select('group_id',$select_group, NULL, array('required' => 'required', 'class'=> 'form-control', 'placeholder'=> 'Výchozí dostupnost pro výrobce')) }}
    </div>
</div>

<p class="text-center">
    {{ link_to_route('adm.pattern.dev.index','Zobrazit všechny výrobce',NULL, array('class'=>'btn btn-primary','role'=> 'button')) }}
    {{ Form::submit('Vložit nového výrobce', array('class' => 'btn btn-success')) }}
</p>

{{ Form::close() }}
@stop
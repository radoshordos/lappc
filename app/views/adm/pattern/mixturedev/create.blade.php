@extends('adm.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Nová grupa výrobců
@stop

{{-- Content --}}
@section('content')
{{ Form::open(['route' => 'adm.pattern.mixturedev.store','class' => 'form-horizontal', 'role' => 'form']) }}
<div class="form-group">
    {{ Form::label('name','Nová grupa výrobce',['class'=> 'col-sm-2 control-label']) }}
    <div class="col-sm-10">
        {{ Form::text('name',NULL, ['required' => 'required', 'class'=> 'form-control', 'placeholder'=> 'Zadej jméno nové grupy výrobců']) }}
    </div>
</div>
<p class="text-center">
    {{ link_to_route('adm.pattern.mixturedev.index','Zobrazit všechny položky',NULL, ['class'=>'btn btn-primary','role'=> 'button']) }}
    {{ Form::submit('Vytvořit novou grupu výrobců', ['class' => 'btn btn-success']) }}
</p>
{{ Form::close() }}
@stop
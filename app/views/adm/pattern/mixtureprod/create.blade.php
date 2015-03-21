@extends('adm.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Nová grupa produktů
@stop

{{-- Content --}}
@section('content')
{{ Form::open(['route' => 'adm.pattern.mixtureprod.store','class' => 'form-horizontal', 'role' => 'form']) }}
<div class="form-group">
    {{ Form::label('purpose','Účel seskupení',['class'=> 'col-sm-2 control-label']) }}
    <div class="col-sm-10">
        {{ Form::select('purpose',$select_purpose, $choice_purpose, ['required' => 'required', 'id'=> 'purpose',  'class'=> 'form-control']) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('name','Nová grupa produktu',['class'=> 'col-sm-2 control-label']) }}
    <div class="col-sm-10">
        {{ Form::text('name',NULL, ['required' => 'required', 'class'=> 'form-control', 'placeholder'=> 'Zadej jméno nové grupy produktů']) }}
    </div>
</div>
<p class="text-center">
    {{ link_to_route('adm.pattern.mixtureprod.index','Zobrazit všechny produkty',NULL, ['class'=>'btn btn-primary','role'=> 'button']) }}
    {{ Form::submit('Vytvořit novou grupu produktů', ['class' => 'btn btn-success']) }}
</p>
{{ Form::close() }}
@stop
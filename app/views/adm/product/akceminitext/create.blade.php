@extends('adm.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Přidat nový akční minitext
@stop

{{-- Content --}}
@section('content')
{{ Form::open(['route' => 'adm.product.akceminitext.store','class' => 'form-horizontal', 'role' => 'form']) }}
<div class="form-group">
    {{ Form::label('name', 'Minitext', ['class'=> 'col-sm-2 control-label']) }}
    <div class="col-sm-10">
        {{ Form::text('name', NULL, ['required' => 'required', 'maxlength' => '32', 'class'=> 'form-control', 'placeholder'=> 'Nový text pro akci (minitext)']) }}
    </div>
</div>
<p class="text-center">
    {{ link_to_route('adm.product.akceminitext.index','Zobrazit všechny minitexty', NULL, ['class'=>'btn btn-primary','role'=> 'button']) }}
    {{ Form::submit('Přidat nový akční minitext', ['class' => 'btn btn-success']) }}
</p>
{{ Form::open(['route' => 'adm.product.akceminitext.store','class' => 'form-horizontal', 'role' => 'form']) }}
@stop
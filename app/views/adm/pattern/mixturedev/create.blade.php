@extends('adm.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Nová skupina výrobců
@stop

{{-- Content --}}
@section('content')
{{ Form::open(array('route' => 'adm.pattern.mixturedev.store','class' => 'form-horizontal', 'role' => 'form')) }}

<div class="form-group">
    {{ Form::label('name','Nová skupina výrobce',array('class'=> 'col-sm-2 control-label')) }}
    <div class="col-sm-10">
        {{ Form::text('name',NULL, array('required' => 'required', 'class'=> 'form-control', 'placeholder'=> 'Zadej jméno nové skupiny výrobců')) }}
    </div>
</div>
<p class="text-center">
    {{ link_to_route('adm.pattern.mixturedev.index','Zobrazit všechny položky',NULL, array('class'=>'btn btn-primary','role'=> 'button')) }}
    {{ Form::submit('Vytvořit nové pravidlo', array('class' => 'btn btn-success')) }}
</p>

{{ Form::close() }}
@stop
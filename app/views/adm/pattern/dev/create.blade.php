@extends('adm.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Přidat nového výrobce
@stop

{{-- Content --}}
@section('content')
{{ Form::open(array('route' => 'adm.pattern.dev.store','class' => 'form-horizontal', 'role' => 'form')) }}

<div class="form-group">
    {{ Form::label('default_warranty','Výchozí záruka',array('class'=> 'col-sm-2 control-label')) }}
    <div class="col-sm-10">
        {{ Form::select('default_warranty',$select_warranty, NULL, array('required' => 'required', 'class'=> 'form-control', 'placeholder'=> 'Výchozí záruka pro výrobce')) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('default_sale','Výchozí sleva',array('class'=> 'col-sm-2 control-label')) }}
    <div class="col-sm-10">
        {{ Form::select('default_sale',$select_sale, NULL, array('required' => 'required', 'class'=> 'form-control', 'placeholder'=> 'Výchozí sleva pro výrobce')) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('default_availability','Výchozí dostupnost',array('class'=> 'col-sm-2 control-label')) }}
    <div class="col-sm-10">
        {{ Form::select('default_availability',$select_availability, NULL, array('required' => 'required', 'class'=> 'form-control', 'placeholder'=> 'Výchozí dostupnost pro výrobce')) }}
    </div>
</div>
<p class="text-center">
    {{ link_to_route('adm.ppc.keywords.index','Zobrazit všechny položky',NULL, array('class'=>'btn btn-primary','role'=> 'button')) }}
    {{ Form::submit('Vytvořit nové pravidlo', array('class' => 'btn btn-success')) }}
</p>
{{ Form::close() }}

@if ($errors->any())
<div>
    <ul>
        {{ implode('',$errors->all('
        <li class="error">:message</li>
        ')) }}
    </ul>
</div>
@endif

@stop
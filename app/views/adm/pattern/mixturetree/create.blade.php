@extends('adm.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Nová grupa skupin
@stop

{{-- Content --}}
@section('content')
{{ Form::open(['route' => 'adm.pattern.mixturetree.store','class' => 'form-horizontal', 'role' => 'form']) }}
<div class="form-group">
    {{ Form::label('name','Nová grupa spupin',['class'=> 'col-sm-2 control-label']) }}
    <div class="col-sm-10">
        {{ Form::text('name',NULL, ['required' => 'required', 'class'=> 'form-control', 'placeholder'=> 'Zadej jméno nové grupy skupin']) }}
    </div>
</div>
<p class="text-center">
    {{ link_to_route('adm.pattern.mixturetree.index','Zobrazit všechny položky',NULL, ['class'=>'btn btn-primary','role'=> 'button']) }}
    {{ Form::submit('Vytvořit novou grupu skupin', ['class' => 'btn btn-success']) }}
</p>
{{ Form::close() }}
@stop
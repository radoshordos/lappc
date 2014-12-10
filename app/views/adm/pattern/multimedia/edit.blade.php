@extends('adm.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Opravit meduim
@stop

{{-- Content --}}
@section('content')
{{ Form::model($media, ['method'=>'PATCH','route' => ['adm.pattern.multimedia.update',$media->id],'class'=>'form-horizontal','role'=>'form']) }}

<div class="form-group">
    {{ Form::label('name','Název',['class'=> 'col-sm-2 control-label']) }}
    <div class="col-sm-10">
        {{ Form::text('name',null,['class'=> 'form-control']) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('source','Zdroj',['class'=> 'col-sm-2 control-label']) }}
    <div class="col-sm-10">
        {{ Form::text('source',null,['class'=> 'form-control']) }}
    </div>
</div>

<p class="text-center">
    {{ link_to_route('adm.pattern.multimedia.index','Zobrazit všechny multimedia',NULL, ['class'=>'btn btn-primary','role'=> 'button']) }}
    {{ Form::submit('Editovat', array('class' => 'btn btn-info')) }}
</p>
{{ Form::close() }}

@stop
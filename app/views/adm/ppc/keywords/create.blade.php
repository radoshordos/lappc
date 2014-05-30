@extends('adm.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
PPC - Nové klíčové slovo
@stop

{{-- Content --}}
@section('content')

<h3 class="text-center">Nové klíčové slovo</h3>

{{ Form::model($keywords,array('method'=>'PATCH','route' => array('adm.ppc.keywords.update',$keyword->id), array('class' => 'form-horizontal', 'role' => 'form')) }}


<div class="form-group">
    {{ Form::label('name','Název',array('class'=> 'col-sm-2 control-label')) }}
    <div class="col-sm-10">
        {{ Form::text('name',NULL,array('class'=> 'form-control', 'placeholder'=> 'Password'))) }}
    </div>
</div>


{{ Form::close() }}

@stop
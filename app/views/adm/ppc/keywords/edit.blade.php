@extends('adm.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
PPC - Editování klíčového slova
@stop

{{-- Content --}}
@section('content')

<h3 class="text-center">Editování klíčového slova</h3>

{{ Form::model($keyword, array('method'=>'PATCH','route' => array('adm.ppc.keywords.update',$keyword->id))) }}

<div class="form-group">
    {{ Form::label('sklik_id','Sklik ID',array('class'=> 'col-sm-2 control-label')) }}
    <div class="col-sm-10">
        {{ Form::text('sklik_id',null,array('class'=> 'form-control', 'placeholder'=> 'Sklik ID','disable' => 'disable')) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('match_id','Match ID',array('class'=> 'col-sm-2 control-label')) }}
    <div class="col-sm-10">
        {{ Form::text('match_id',null,array('class'=> 'form-control', 'placeholder'=> 'Match ID','disable' => 'disable')) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('name','Název',array('class'=> 'col-sm-2 control-label')) }}
    <div class="col-sm-10">
        {{ Form::text('name',null,array('class'=> 'form-control', 'placeholder'=> 'Klíčové slovo')) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('cpc','CPC',array('class'=> 'col-sm-2 control-label')) }}
    <div class="col-sm-10">
        {{ Form::text('cpc',null,array('class'=> 'form-control', 'placeholder'=> 'Cena CPC v haléřích')) }}
    </div>
</div>

{{ Form::close() }}

@stop
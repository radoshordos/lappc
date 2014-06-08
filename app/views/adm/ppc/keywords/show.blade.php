@extends('adm.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
PPC - Detail klíčového slova
@stop

{{-- Content --}}
@section('content')
<form class="form-horizontal" role="form">
    <div class="form-group">
        {{ Form::label('sklik_id','Sklik ID',array('class'=> 'col-sm-2 control-label')) }}
        <div class="col-sm-10">
            {{ Form::text('sklik_id',$keyword->sklik_id,array('readonly' => 'readonly','class'=> 'form-control', 'placeholder'=> 'Sklik ID','disable' => 'disable')) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('match_code','Shoda slova',array('class'=> 'col-sm-2 control-label')) }}
        <div class="col-sm-10">
            {{ Form::text('match_code',$keyword->ppc_keywords_match->string_before.$keyword->ppc_keywords_match->code.$keyword->ppc_keywords_match->string_after,array('readonly' => 'readonly','class'=> 'form-control', 'placeholder'=> 'Shoda slova','disable' => 'disable')) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('name','Název',array('class'=> 'col-sm-2 control-label')) }}
        <div class="col-sm-10">
            {{ Form::text('name',$keyword->name,array('readonly' => 'readonly','class'=> 'form-control', 'placeholder'=> 'Klíčové slovo')) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('cpc','CPC (v haléřích)',array('class'=> 'col-sm-2 control-label')) }}
        <div class="col-sm-10">
            {{ Form::text('cpc',$keyword->cpc,array('readonly' => 'readonly','class'=> 'form-control', 'placeholder'=> 'Cena CPC v haléřích')) }}
        </div>
    </div>
</form>
<p class="text-center">
    {{ link_to_route('adm.ppc.keywords.index','Zobrazit všechny položky',NULL, array('class'=>'btn btn-primary','role'=> 'button')) }}
    {{ link_to_route('adm.ppc.keywords.edit','Editovat klíčové slovo',array($keyword->id),array('class' => 'btn btn-info')) }}
    {{ link_to_route('adm.ppc.keywords.create','Nové klíčové slovo',NULL,array('class' => 'btn btn-success')) }}
</p>

@stop

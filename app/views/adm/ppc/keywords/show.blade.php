@extends('adm.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
PPC - Klíčové slovo detail
@stop

{{-- Content --}}
@section('content')
<form class="form-horizontal" role="form">
    <div class="form-group">
        {{ Form::label('sklik_id','Sklik ID',array('class'=> 'col-sm-2 control-label')) }}
        <div class="col-sm-10">
            {{ Form::text('sklik_id',$keyword->sklik_id,array('class'=> 'form-control', 'placeholder'=> 'Sklik ID','disable' => 'disable')) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('match_id','Match ID',array('class'=> 'col-sm-2 control-label')) }}
        <div class="col-sm-10">
            {{ Form::text('match_id',$keyword->match_id,array('class'=> 'form-control', 'placeholder'=> 'Match ID','disable' => 'disable')) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('name','Název',array('class'=> 'col-sm-2 control-label')) }}
        <div class="col-sm-10">
            {{ Form::text('name',$keyword->name,array('class'=> 'form-control', 'placeholder'=> 'Klíčové slovo')) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('cpc','CPC (v haléřích)',array('class'=> 'col-sm-2 control-label')) }}
        <div class="col-sm-10">
            {{ Form::text('cpc',$keyword->cpc,array('class'=> 'form-control', 'placeholder'=> 'Cena CPC v haléřích')) }}
        </div>
    </div>
</form>
<p>
    {{ link_to_route('adm.ppc.keywords.index','Zobrazit všechny položky',NULL, array('class'=>'btn btn-default','role'=> 'button')) }}
</p>

@stop

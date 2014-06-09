@extends('adm.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
PPC - Editování klíčového slova
@stop

{{-- Content --}}
@section('content')
{{ Form::model($keyword, array('method'=>'PATCH','route' => array('adm.ppc.keywords.update',$keyword->id),'class'=>'form-horizontal','role'=>'form')) }}

<div class="form-group">
    {{ Form::label('match_id','Shoda',array('class'=> 'col-sm-2 control-label')) }}
    <div class="col-sm-10">
        {{ Form::select('match_id',$select_keywords_match, NULL, array('required' => 'required', 'class'=> 'form-control', 'placeholder'=> 'Shoda slov')) }}
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
        {{ Form::input('number','cpc',null,array('class'=> 'form-control','min' => '20', 'max'=>'500','placeholder'=> 'Cena CPC v haléřích')) }}
    </div>
</div>
<p class="text-center">
    {{ link_to_route('adm.ppc.keywords.index','Zobrazit všechny položky',NULL, array('class'=>'btn btn-primary','role'=> 'button')) }}
    {{ Form::submit('Editovat klíčové slovo', array('class' => 'btn btn-info')) }}
</p>
{{ Form::close() }}

@stop
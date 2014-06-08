@extends('adm.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
PPC - Nové klíčové slovo
@stop

{{-- Content --}}
@section('content')
{{ Form::open(array('route' => 'adm.ppc.keywords.store','class' => 'form-horizontal', 'role' => 'form')) }}

<div class="form-group">
    {{ Form::label('match_id','Shoda',array('class'=> 'col-sm-2 control-label')) }}
    <div class="col-sm-10">
        {{ Form::select('match_id',$select_keywords_match, NULL, array('required' => 'required', 'class'=> 'form-control', 'placeholder'=> 'Shoda slov')) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('name','Název',array('class'=> 'col-sm-2 control-label')) }}
    <div class="col-sm-10">
        {{ Form::text('name',NULL,array('required' => 'required', 'class'=> 'form-control', 'placeholder'=> 'Klíčové slovo')) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('cpc','CPC (v haléřích)',array('class'=> 'col-sm-2 control-label')) }}
    <div class="col-sm-10">
        {{ Form::input('number','cpc',NULL,array('min'=> '20','max'=> '500','required' => 'required','class'=> 'form-control', 'placeholder'=> 'Cena za proklik v haléřích')) }}
    </div>
</div>
<p class="text-center">
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
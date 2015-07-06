@extends('adm.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Přidání textu do existující skupiny
@stop

{{-- Content --}}
@section('content')
    {{ Form::open(['route' => 'adm.pattern.treetext.store','class' => 'form-horizontal', 'role' => 'form']) }}
    <div class="form-group">
        {{ Form::label('parent_id','Skupina #ID',['class'=> 'col-sm-2 control-label']) }}
        <div class="col-sm-10">
            {{ Form::select('tree_id',$tree_for_text, NULL, ['required' => 'required', 'class'=> 'form-control']) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('text','Obsah textu',['class'=> 'col-sm-2 control-label']) }}
        <div class="col-sm-10">
            <textarea name="text" class="form-control" rows="40"></textarea>
        </div>
    </div>
    <p class="text-center">
        {{ link_to_route('adm.pattern.treetext.index','Text ve skupinách', NULL, ['class' => 'btn btn-primary','role' => 'button']) }}
        {{ Form::submit('Vložit text', ['class' => 'btn btn-success']) }}
    </p>
    {{ Form::close() }}
@stop
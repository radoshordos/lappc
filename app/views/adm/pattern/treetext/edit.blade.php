@extends('adm.layouts.default')

{{-- Web site Title --}}
@section('title') @parent Editace skupin zboží @stop

{{-- JavaScript on page --}}
@section ('script')
@stop

{{-- Content --}}
@section('content')
    {{ Form::model($treetext, ['method' => 'PATCH','route' => ['adm.pattern.treetext.update',$treetext->id],'class' => 'form-horizontal','role' => 'form']) }}
    <div class="form-group">
        {{ Form::label('parent_id','Název',['class' => 'col-sm-2 control-label']) }}
        <div class="col-sm-10">
            {{ Form::text('tree_id', $treetext->tree->id." - ".$treetext->tree->name, ['required' => 'required', "readonly", 'class' => 'form-control']) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('text','Obsah textu',['class' => 'col-sm-2 control-label']) }}
        <div class="col-sm-10">
            <textarea name="text" class="form-control" rows="40">{{ $treetext->text }}</textarea>
        </div>
    </div>
    <p class="text-center">
        {{ link_to_route('adm.pattern.treetext.index','Text ve skupinách', NULL, ['class' => 'btn btn-primary','role' => 'button']) }}
        {{ Form::submit('Editovat text', ['class' => 'btn btn-info']) }}
    </p>
    {{ Form::close() }}
@stop
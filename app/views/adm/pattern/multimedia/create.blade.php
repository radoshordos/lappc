@extends('adm.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent Nové MultiMedium @stop

{{-- JavaScript on page --}}
@section ('script')
<script>
    $(document).ready(function () {
        $("#variations_id").select2({});
    });
</script>
@stop

{{-- Content --}}
@section('content')
{{ Form::open(['route' => 'adm.pattern.multimedia.store','class' => 'form-horizontal', 'role' => 'form']) }}
<div class="form-group">
    {{ Form::label('variations_id','Shoda',['class'=> 'col-sm-2 control-label']) }}
    <div class="col-sm-10">
        {{ Form::select('variations_id',$select_variations, NULL, ['required' => 'required', 'class'=> 'form-control', 'placeholder'=> 'Typ média']) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('name','Název',['class'=> 'col-sm-2 control-label']) }}
    <div class="col-sm-10">
        {{ Form::text('name',NULL,['required' => 'required', 'class'=> 'form-control', 'placeholder'=> 'Název multimedia']) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('source','Zdroj',['class'=> 'col-sm-2 control-label']) }}
    <div class="col-sm-10">
        {{ Form::text('source',NULL,['required' => 'required','class'=> 'form-control', 'placeholder'=> 'Zdroj dat']) }}
    </div>
</div>
<p class="text-center">
    {{ link_to_route('adm.pattern.multimedia.index','Zobrazit všechny multimedia',NULL, ['class'=>'btn btn-primary','role'=> 'button']) }}
    {{ Form::submit('Vytvořit multimedium', ['class' => 'btn btn-success']) }}
</p>
{{ Form::close() }}
@stop
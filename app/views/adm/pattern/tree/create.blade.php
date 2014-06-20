@extends('adm.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Přidání nové skupiny zboží
@stop

{{-- JavaScript on page --}}
@section ('script')
<script>
    $(document).ready(function () {
        $("#parent_id").select2({
            placeholder: "Zvolte rodiče skupiny",
            allowClear: true
        });
    });
</script>
@stop


{{-- Content --}}
@section('content')
{{ Form::open(array('route' => 'adm.pattern.tree.store','class' => 'form-horizontal', 'role' => 'form')) }}

<div class="form-group">
    {{ Form::label('parent_id','Rodič #ID',array('class'=> 'col-sm-2 control-label')) }}
    <div class="col-sm-10">
        {{ Form::select('parent_id',$select_parent, NULL, array('required' => 'required', 'class'=> 'form-control', 'placeholder'=> 'Výchozí dostupnost pro výrobce')) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('position','Pozice #ID',array('class'=> 'col-sm-2 control-label')) }}
    <div class="col-sm-10">
        {{ Form::selectRange('position', 1, 99, NULL, array('required' => 'required', 'class'=> 'form-control', 'placeholder'=> 'Pozice produktu vzhledem k menu')) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('name','Název skupiny',array('class'=> 'col-sm-2 control-label')) }}
    <div class="col-sm-10">
        {{ Form::text('name',NULL,array('required' => 'required', 'maxlength' => '40', 'class'=> 'form-control', 'placeholder'=> 'Název skupiny')) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('desc','Titulek skupiny',array('class'=> 'col-sm-2 control-label')) }}
    <div class="col-sm-10">
        {{ Form::text('desc',NULL,array('required' => 'required', 'maxlength' => '80', 'class'=> 'form-control', 'placeholder'=> 'Titulek skupiny')) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('relative','Reletivní cesta',array('class'=> 'col-sm-2 control-label')) }}
    <div class="col-sm-10">
        {{ Form::text('relative',NULL,array('required' => 'required', 'maxlength' => '32', 'class'=> 'form-control', 'placeholder'=> 'Relativní cesta')) }}
    </div>
</div>

<p class="text-center">
    {{ link_to_route('adm.pattern.tree.index','Zobrazit všechny skupiny',NULL, array('class' => 'btn btn-primary','role' => 'button')) }}
    {{ Form::submit('Vložit nového výrobce', array('class' => 'btn btn-success')) }}
</p>

{{ Form::close() }}
@stop



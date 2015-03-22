@extends('adm.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Opravit meduim
@stop

{{-- JavaScript on page --}}
@section ('script')
	<script>
		$(document).ready(function () {
			$("#mixture_dev_id").select2({
				placeholder: "Seskupení výrobců",
				allowClear: true
			});
			$("#mixture_prod_id").select2({
				placeholder: "Seskupení produktů",
				allowClear: true
			});
		});
	</script>
@stop

{{-- Content --}}
@section('content')
{{ Form::model($media, ['method'=>'PATCH','route' => ['adm.pattern.multimedia.update', $media->id],'class'=>'form-horizontal', 'role'=>'form']) }}
<div class="form-group">
    {{ Form::label('name','Název',['class'=> 'col-sm-2 control-label']) }}
    <div class="col-sm-10">
        {{ Form::text('name',NULL,['class'=> 'form-control']) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('source','Zdroj',['class'=> 'col-sm-2 control-label']) }}
    <div class="col-sm-10">
        {{ Form::text('source',NULL,['class'=> 'form-control']) }}
    </div>
</div>
<div class="form-group">
	{{ Form::label('mixture_dev_id','Seskupení výrobců',['class'=> 'col-sm-2 control-label']) }}
	<div class="col-sm-10">
		{{  Form::select('mixture_dev_id',$select_mixture_dev, NULL, ['id'=> 'mixture_dev_id', 'class'=> 'form-control']) }}
	</div>
</div>
<div class="form-group">
	{{ Form::label('mixture_prod_id','Seskupení produktů',['class'=> 'col-sm-2 control-label']) }}
	<div class="col-sm-10">
		{{  Form::select('mixture_prod_id',$select_mixture_prod, NULL, ['id'=> 'mixture_prod_id', 'class'=> 'form-control']) }}
	</div>
</div>
<p class="text-center">
    {{ link_to_route('adm.pattern.multimedia.index','Zobrazit všechny multimedia',NULL, ['class'=>'btn btn-primary','role'=> 'button']) }}
    {{ Form::submit('Editovat', ['class' => 'btn btn-info']) }}
</p>
{{ Form::close() }}
@stop
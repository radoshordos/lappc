@extends('adm.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Založení nové .csv šablony
@stop

{{-- JavaScript on page --}}
@section ('script')
<script>
    $(document).ready(function () {
        $("#mixture_dev_id").select2({
            allowClear: true
        });
    });
</script>
@stop

{{-- Content --}}
@section('content')
{{ Form::open(['route' => 'adm.sync.template.store','class' => 'form-horizontal', 'role' => 'form']) }}

<div class="form-group">
    {{ Form::label('mixture_dev_id','Skupana výrobců',['class'=> 'col-sm-2 control-label']) }}
    <div class="col-sm-10">
        {{ Form::select('mixture_dev_id', $select_mixture_dev, NULL, ['required' => 'required', 'class'=> 'form-control', 'placeholder'=> 'Zvol skupinu výrobců']) }}
    </div>
</div>

<p class="text-center">
    {{ link_to_route('adm.sync.template.index','Zobrazit všechny .csv šablony',NULL, ['class'=>'btn btn-primary','role'=> 'button']) }}
    {{ Form::submit('Založit novou .csv šablonu', ['class' => 'btn btn-success']) }}
</p>

{{ Form::close() }}
@stop
@extends('adm.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Import .csv dat
@stop

{{-- JavaScript on page --}}
@section ('script')
<script>
    $(document).ready(function () {
        $("#template_id").select2({});
    });
</script>
@stop

{{-- Content --}}
@section('content')
<div class="form-group">
    {{ Form::label('template_id','Šablona',array('class'=> 'col-sm-2 control-label')) }}
    <p class="col-sm-10">
        {{ Form::select('template_id', $sync_template, NULL, array('required' => 'required', 'class'=> 'form-control'))
        }}
    </p>
</div>
<div class="form-group">
    <p class="col-sm-12">
        {{ Form::textarea('notes', null, ['size' => '80x20', 'class' => 'form-control']) }}
    </p>
</div>

<p class="text-center">
    {{ link_to_route('adm.pattern.prod.index','Zkontolovat',NULL, array('class'=>'btn btn-primary','role'=> 'button')) }}

</p>
@stop
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
            minimumResultsForSearch: 3,
            allowClear: true
        });
    });
</script>
@stop

{{-- Content --}}
@section('content')
{{ Form::open(array('route' => 'adm.sync.template.store','class' => 'form-horizontal', 'role' => 'form')) }}

<div class="form-group">
    {{ Form::label('mixture_dev_id','Skupana výrobců',array('class'=> 'col-sm-2 control-label')) }}
    <div class="col-sm-10">
        {{ Form::select('mixture_dev_id',$select_mixture_dev, NULL, array('required' => 'required', 'class'=> 'form-control', 'placeholder'=> 'Zvol skupinu výrobců')) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('purpose','Účel šablony',array('class'=> 'col-sm-2 control-label')) }}
    <div class="col-sm-10">
        {{ Form::select('purpose',['manual_sync' => 'Synchroniační šablona','manual_action' => 'Akční šablona' ], NULL, array('required' => 'required', 'class'=> 'form-control', 'placeholder'=> 'Zvol účel šablony')) }}
    </div>
</div>

<p class="text-center">
    {{ link_to_route('adm.sync.template.index','Zobrazit všechny .csv šablony',NULL, array('class'=>'btn btn-primary','role'=> 'button')) }}
    {{ Form::submit('Založit novou .csv šablonu', array('class' => 'btn btn-success')) }}
</p>
{{ Form::close() }}
@stop
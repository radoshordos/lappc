@extends('adm.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
GRAB
@stop

{{-- JavaScript on page --}}
@section ('script')
<script>
</script>
@stop

{{-- Content --}}
@section('content')
<!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
  <li class="active"><a href="#profile-group" role="tab" data-toggle="tab">Profily skupin</a></li>
  <li><a href="#group" role="tab" data-toggle="tab">Skupiny</a></li>
  <li><a href="#add-group" role="tab" data-toggle="tab">Přidat skupinu</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
  <div class="tab-pane fade in active" id="profile-group">

  </div>
  <div class="tab-pane fade" id="group">

  </div>
  <div class="tab-pane fade" id="add-group">
        {{ Form::open(array('route' => ['adm.tools.grab.index','#group'],'class' => 'form-horizontal', 'role' => 'form')) }}
        <div class="form-group" style="margin-top: 2em">
            {{ Form::label('charset','Znaková sada',array('class'=> 'col-sm-2 control-label')) }}
            <div class="col-sm-10">
                {{ Form::text('charset', NULL, array("size" => "12", "maxlength" => "16","required" => "required",'class'=> 'form-control')) }}
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('name','Název skupiny',array('class'=> 'col-sm-2 control-label')) }}
            <div class="col-sm-10">
                {{ Form::text('name', NULL, array("size" => "24", "maxlength" => "40","required" => "required",'class'=> 'form-control')) }}
            </div>
        </div>
        <p class="text-center">
            {{ Form::submit('Přidat skupinu', array('name' => 'submit-add-group','class' => 'btn btn-success')) }}
        </p>
        {{ Form::close() }}
  </div>
</div>
@stop
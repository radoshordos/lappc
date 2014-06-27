@extends('adm.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
PPC konfigurace
@stop

{{-- Content --}}
@section('content')
<form class="form-horizontal" role="form" method='post'>
    <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
        <div class="col-sm-10">
            {{ Form::email('ppc-url-file', $config->email,array('class'=>'form-control','disabled' => 'disabled','placeholder' => 'Email')) }}
        </div>
    </div>
    <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">PPC Url</label>
        <div class="col-sm-10">
            {{ Form::url('ppc-url-file', $config->xmlfeed,array('class'=>'form-control','placeholder' => 'PPC Url XML soubor')) }}
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default">Uložit</button>
        </div>
    </div>
</form>
@stop
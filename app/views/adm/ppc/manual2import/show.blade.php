@extends('adm.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Home
@stop

{{-- Content --}}
@section('content')
<h1>Manual import</h1>

{{ Form::open(array('url' => URL::route('adm.ppc.manual2import'), 'files' => true)) }}
<?php
echo Form::file('file');
echo Form::submit('Načíst');

$destinationPath = 'uploads';
$filename = str_random(12);
//$filename = $file->getClientOriginalName();
//$extension =$file->getClientOriginalExtension();
$upload_success = Input::file('file')->move($destinationPath, $filename);

var_dump($upload_success);

?>
{{ Form::close() }}

@stop
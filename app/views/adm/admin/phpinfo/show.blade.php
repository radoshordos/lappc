@extends('adm.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Home
@stop

{{-- Content --}}
@section('content')
<?php
ob_start();
phpinfo();
$pinfo = ob_get_contents();
ob_end_clean();
echo preg_replace('%^.*<body>(.*)</body>.*$%ms', '$1', $pinfo);
?>


@stop
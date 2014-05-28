@extends('adm.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
PPC - Nové pravidlo
@stop

{{-- Content --}}
@section('content')
{{ Form::open(array('action' => 'Ppc2rulesController@store')) }}
<h3 class="text-center">Nové pravidlo</h3>

{{ Form::submit('Vytvořit novou skupinu', array('class' => 'btn btn-primary')) }}
{{ Form::close() }}


@stop

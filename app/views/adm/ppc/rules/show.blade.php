@extends('adm.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
PPC - Přehled pravidel
@stop

{{-- Content --}}
@section('content')
<h3 class="text-center">Přehled pravidel</h3>

<p>
    <button type="button" class="btn btn-default" onClick="location.href='{{ action('PpcRulesController@create')}}'">Přidat nové pravidlo</button>
</p>

@stop


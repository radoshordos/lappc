@extends('adm.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
CSV šablony
@stop

{{-- Content --}}
@section('content')


<p class="text-center">
    {{ link_to_route('adm.sync.template.create','Přidat CSV šablonu',NULL, array('class'=>'btn btn-success','role'=> 'button')) }}
</p>

@stop
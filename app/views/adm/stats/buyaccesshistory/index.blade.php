@extends('adm.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Historie přístupů a nákupů
@stop


{{-- Content --}}
@section('content')

    <blockquote>
        {{ Form::open(['route' => ['adm.stats.buyaccesshistory.index'],'method' => 'GET','class' => 'form-horizontal', 'role' => 'form']) }}
        <div class="row">
            <div class="col-xs-12">
                {{ Form::select('select_limit', $input['select_limit'], $input['choice_limit'], ['id'=> 'select_limit', 'class'=> 'form-control', 'onchange' => 'this.form.submit()']) }}
            </div>
        </div>
        {{ Form::close() }}
    </blockquote>



    {{ var_dump($history) }}

    {{ var_dump($input) }}

@stop
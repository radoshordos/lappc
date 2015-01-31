@extends('adm.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Export synchronizačních dat
@stop

{{-- JavaScript on page --}}
@section ('script')
<script>
    $(document).ready(function () {
        $("#select_mixture_dev").select2({});
    });
    $(document).ready(function () {
        $("#select_import").select2({});
    });
</script>
@stop

{{-- Content --}}
@section('content')
    {{ Form::open(['route' => 'adm.sync.csvexport.index','class' => 'form-horizontal', 'method'=>'GET', 'role' => 'form']) }}
    <div class="row">
        <div class="form-group">
            <div class="col-md-3">
                {{ Form::label('select_mixture_dev','Seskupení výrobců') }}
            </div>
            <div class="col-md-9">
                {{ Form::select('select_mixture_dev', $select_mixture_dev, $choice_mixture_dev, ['id' => 'select_mixture_dev', 'class'=> 'form-control']) }}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="form-group">
            <div class="col-md-3">
                {{ Form::label('select_import','Druh exportních dat') }}
            </div>
            <div class="col-md-9">
                {{ Form::select('select_import', ['autosync' => 'Automaticky importované','manualsync' => 'Manuálně importované'], $choice_import, ['id' => 'select_import', 'class'=> 'form-control']) }}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="form-group">
            <div class="col-md-12 text-center">
                {{ Form::submit('Generovat export', ['name' => 'export','class' => 'btn btn-success']) }}
            </div>
        </div>
    </div>
    {{ Form::close() }}
    @if (!empty($choice_export))
        {{ Form::textarea('result', implode("\n",$result), ['size' => '180x30', 'class' => 'form-control' ]) }}
    @endif
@stop
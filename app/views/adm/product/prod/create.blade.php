@extends('adm.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Nový produkt
@stop

{{-- JavaScript on page --}}
@section ('script')
    <script>
        $(document).ready(function () {
            $("#tree_id").select2({
                placeholder: "Skupina",
                allowClear: true
            });
            $("#dev_id").select2({
                placeholder: "Výrobce",
                allowClear: true
            });
        });
    </script>
@stop

{{-- Content --}}
@section('content')
    {{ Form::open(['route' => 'adm.product.akceminitext.store','class' => 'form-horizontal', 'role' => 'form']) }}
        <div class="row" style="margin-bottom: 5px">
            <div class="col-lg-8">{{ Form::select('tree_id', $select_tree, NULL, ['id'=> 'tree_id', 'required' => 'required', 'class'=> 'form-control']) }}</div>
            <div class="col-lg-4">.col-md-4</div>
        </div>
        <div class="row" style="margin-bottom: 5px">
            <div class="col-lg-6">
                <div class="input-group btn-group-justified">
                    <span class="btn-group">{{ Form::select('dev_id', $select_dev, NULL, ['id'=> 'dev_id', 'required' => 'required', 'class'=> 'form-control']) }}</span>
                    <span class="btn-group">{{ Form::select('warranty_id', $select_warranty, NULL, ['required' => 'required', 'class'=> 'form-control']) }}</span>
                </div>
            </div>
            <div class="col-lg-6"></div>
        </div>
        <div class="row" style="margin-bottom: 5px">
            <div class="col-lg-4">{{ Form::text('name', NULL, ['required' => 'required', 'maxlength' => '40', 'class'=> 'form-control', 'placeholder'=> 'Název produktu']) }}</div>
            <div class="col-lg-8">.col-md-4</div>
        </div>
        <div class="row" style="margin-bottom: 5px">
            <div class="col-lg-6">{{ Form::text('desc',NULL,['required' => 'required', 'maxlength' => '128', 'class'=> 'form-control', 'placeholder'=> 'Popis produktu']) }}</div>
            <div class="col-lg-6">.col-md-4</div>
        </div>
    <p class="text-center">
        {{ Form::submit('Přidat produkt', ['name' => 'button-submit-create', 'class' => 'btn btn-info']) }}
    </p>
    {{ Form::close() }}
@stop
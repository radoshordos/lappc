@extends('adm.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Přehled akcí
@stop

{{-- JavaScript on page --}}
@section ('script')
    <script>
        $(document).ready(function () {
            $("#select_minitext").select2({
                allowClear: true
            });
            $("#select_availability").select2({
                allowClear: true
            });
            $("#select_mixture_dev").select2({
                allowClear: true
            });
        });
    </script>
@stop

{{-- Content --}}
@section('content')
{{ Form::open(['route' => ['adm.product.akce.index'],'method' => 'GET','class' => 'form-horizontal', 'role' => 'form']) }}
<blockquote>
    <div class="row">
        <div class="col-xs-4">
            {{ Form::select('select_minitext', $select_minitext, $choice_minitext, ['id'=> 'select_minitext', 'class'=> 'form-control','placeholder' => 'Minitext']) }}
        </div>
        <div class="col-xs-4">
            {{ Form::select('select_availability', $select_availability, $choice_availability, ['id'=> 'select_availability', 'class'=> 'form-control','placeholder' => 'Platnost']) }}
        </div>
        <div class="col-xs-3">
            {{ Form::select('select_mixture_dev', $select_mixture_dev, $choice_mixture_dev, ['id'=> 'select_mixture_dev', 'class'=> 'form-control','placeholder' => 'Výrobci']) }}
        </div>
        <div class="col-xs-1">
            {{ Form::submit('Hledat',['name' => 'hledat','class'=> 'form-control btn-primary'])  }}
        </div>
    </div>
</blockquote>

@if ($akce->count())
<div class="row">
    <div class="col-md-12">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th class="col-xs-1"><span class="glyphicon glyphicon-lock" title="Šablona akce"></span></th>
                    <th class="col-xs-4">{{ Form::text('search_name',$search_name,['placeholder'=> 'Název']) }}</th>
                    <th class="col-xs-7">Minitext</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <td class="text-center" colspan="3">{{ $akce->appends(['select_mixture_dev' => $choice_mixture_dev,'select_availability' => $choice_availability,'select_minitext' => $choice_minitext])->links(); }}</td>
                </tr>
            </tfoot>
            <tbody>
            @foreach ($akce as $row)
                <tr>
                    <td>{{ $row->akce_template_id }}</td>
                    <td>{{ link_to_route('adm.product.prod.edit', $row->prod_name." [".$row->prod_ic_all."]",[$row->tree_id,$row->prod_id,"#akce"]) }}</td>
                    <td>{{ $row->akce_minitext_name }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endif
{{ Form::close() }}
@stop
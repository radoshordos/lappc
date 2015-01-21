@extends('adm.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent Editace produktu @stop

{{-- JavaScript on page --}}
@section ('script')
<link rel="stylesheet" href="{{ asset('admin/components/bootstrap-fileinput/css/fileinput.min.css') }}">
<script src="{{ asset('admin/components/bootstrap-fileinput/js/fileinput.min.js') }}"></script>
<script>
    $(document).ready(function (e) {
        $("#list_tree").select2({});
        $("#list_prod").select2({});
        $("#tree_id").select2({});
        $("#dev_id").select2({});
        $("#akce_template_id").select2({
            allowClear: true
        });
        $('#myTab a').click(function (e) {
            e.preventDefault();
            $(this).tab('show');
        });
        $('#myTab a[href="#profile"]').tab('show');
        if(location.hash) {
            $('a[href=' + location.hash + ']').tab('show');
        };
        $(document.body).on("click", "a[data-toggle]", function(event) {
            location.hash = this.getAttribute("href");
        });
    });
    $(window).on('popstate', function() {
        var anchor = location.hash || $("a[data-toggle=tab]").first().attr("href");
        $('a[href=' + anchor + ']').tab('show');
    });
    $(document).submit(function(event) {
        var data_title1 = document.getElementById("data_title1").value;
        var data_title2 = document.getElementById("data_title2").value;
        var data_title3 = document.getElementById("data_title3").value;
        if((data_title1 === data_title2 && data_title1 > 0) || (data_title1 === data_title3 && data_title1 > 0) || (data_title2 === data_title3 && data_title2 > 0))
        {
            event.preventDefault();
            alert( "Duplicitní položky obsahu titulků" );
        }
    });
</script>
@stop

{{-- Content --}}
@section('content')
{{ Form::open(['route' => ['adm.product.prod.edit', $choice_tree, $choice_prod]]) }}
<div class="input-group form-group">
    <span class="input-group-addon">Skupina</span>
    {{ Form::select('list_tree',$list_tree, $choice_tree, ['id' => 'list_tree', 'class'=> 'form-control', 'onchange' => 'this.form.submit()']) }}
</div>

@if (isset($list_prod) && !empty($list_prod))
<div class="input-group form-group">
    <span class="input-group-addon">Produkt</span>
    {{ Form::select('list_prod',$list_prod, $choice_prod, ['id' => 'list_prod','class'=> 'form-control', 'onchange' => 'this.form.submit()']) }}
</div>
<br />
@endif
{{ Form::close() }}

@if (isset($prod))

<div id="content">
    <ul id="tabs" class="nav nav-tabs container" data-tabs="tabs">
        <li class="active"><a href="#prod" data-toggle="tab">Produkt</a></li>
        <li><a href="#source" data-toggle="tab">Obsah</a></li>
        @if ($prod->difference_id > 1)
            <li><a href="#difference" data-toggle="tab">Variace</a></li>
        @endif
        <li><a href="#fotogalerie" data-toggle="tab">Fotogalerie</a></li>
        <li><a href="#aktivita" data-toggle="tab">Aktivita</a></li>
        @if ($prod->mode_id == 4 && isset($prod->akce->akce_prod_id))
            <li><a href="#akce" data-toggle="tab">Akce</a></li>
        @endif
    </ul>
    <div id="my-tab-content" class="tab-content">
    {{ Form::model($prod, ['method'=>'PATCH','route' => ['adm.product.prod.update',$choice_tree, $choice_prod],'class'=>'form-horizontal','role'=>'form','files'=> true]) }}
        @include('adm.product.prod.blade.prod')
        @include('adm.product.prod.blade.source')
        @if ($prod->difference_id > 1)
                @include('adm.product.prod.blade.difference')
        @endif
    {{ Form::close() }}
    @include('adm.product.prod.blade.aktivita')
    @include('adm.product.prod.blade.fotogalerie')
    @if ($prod->mode_id == 4 && isset($prod->akce->akce_prod_id))
            @include('adm.product.prod.blade.akce')
    @endif
    </div>
</div>
@endif
@stop
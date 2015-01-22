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
            if (location.hash) {
                $('a[href=' + location.hash + ']').tab('show');
            };
            $(document.body).on("click", "a[data-toggle]", function (event) {
                location.hash = this.getAttribute("href");
            });
        });
        $(window).on('popstate', function () {
            var anchor = location.hash || $("a[data-toggle=tab]").first().attr("href");
            $('a[href=' + anchor + ']').tab('show');
        });
        $(document).submit(function (event) {
            var data_title1 = document.getElementById("data_title1").value;
            var data_title2 = document.getElementById("data_title2").value;
            var data_title3 = document.getElementById("data_title3").value;
            if ((data_title1 === data_title2 && data_title1 > 0) || (data_title1 === data_title3 && data_title1 > 0) || (data_title2 === data_title3 && data_title2 > 0)) {
                event.preventDefault();
                alert("Duplicitní položky obsahu titulků");
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
        <br/>
    @endif
    {{ Form::close() }}

    @if (isset($prod))
        <div role="tabpanel">
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#prod" aria-controls="prod" role="tab" data-toggle="tab">Produkt</a></li>
                <li role="presentation"><a href="#source" aria-controls="source" role="tab" data-toggle="tab">Obsah</a></li>
                @if ($prod->difference_id > 1)
                    <li role="presentation"><a href="#difference" aria-controls="difference" role="tab" data-toggle="tab">Variace</a></li>
                @endif
                <li role="presentation"><a href="#fotogalerie" aria-controls="fotogalerie" role="tab" data-toggle="tab">Fotogalerie</a></li>
                <li role="presentation"><a href="#aktivita" aria-controls="aktivita" role="tab" data-toggle="tab">Aktivita</a></li>
                @if ($prod->mode_id == 4 && isset($prod->akce->akce_prod_id))
                    <li role="presentation"><a href="#akce" aria-controls="akce" role="tab" data-toggle="tab">Akce</a></li>
                @endif
            </ul>

            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="prod">
                    {{ Form::model($prod, ['method'=>'PATCH','route' => ['adm.product.prod.update',$choice_tree, $choice_prod],'class'=>'form-horizontal','role'=>'form','files'=> true]) }}
                    @include('adm.product.prod.blade.prod')
                </div>
                <div role="tabpanel" class="tab-pane" id="source">
                    @include('adm.product.prod.blade.source')
                    {{ Form::close() }}
                </div>
                @if ($prod->difference_id > 1)
                    <div role="tabpanel" class="tab-pane" id="difference">
                        @include('adm.product.prod.blade.difference')
                    </div>
                @endif
                <div role="tabpanel" class="tab-pane" id="fotogalerie">
                    @include('adm.product.prod.blade.fotogalerie')
                </div>
                <div role="tabpanel" class="tab-pane" id="aktivita">
                    @include('adm.product.prod.blade.aktivita')
                </div>
                @if ($prod->mode_id == 4 && isset($prod->akce->akce_prod_id))
                    <div role="tabpanel" class="tab-pane" id="akce">
                        @include('adm.product.prod.blade.akce')
                    </div>
                @endif
            </div>
        </div>
    @endif
@stop
@extends('adm.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Nový produkt
@stop

{{-- JavaScript on page --}}
@section ('script')
    <script>
        var rowNum = 1;
        function addRow(frm) {
            rowNum++;
            var row = '<div id="rowNum'+rowNum+'" class="row"><div class="col-lg-7"><input type="url" name="urlimg[]" class="form-control" placeholder="URL obrázku nebo zdroj filtru" /></div><div class="col-lg-5"></div></div>';
            jQuery('#img_rows').append(row);
        }

        $(document).ready(function () {
            $("#tree_id").select2({
                placeholder: "Skupina",
                allowClear: true
            });
            $("#dev_id").select2({
                placeholder: "Výrobce",
                allowClear: true
            });
            $("#grab_profile").select2({
                placeholder: "Filtrační šablona",
                allowClear: true
            });
        });
    </script>
@stop

{{-- Content --}}
@section('content')
    {{ Form::open(['route' => 'adm.product.prod.store','class' => 'form-horizontal', 'role' => 'form']) }}
    <div class="row" style="margin-bottom: 5px">
        <div class="col-lg-8">{{ Form::select('tree_id', $select_tree, NULL, ['id'=> 'tree_id', 'required' => 'required', 'class'=> 'form-control']) }}</div>
        <div class="col-lg-4">{{ Form::select('difference_id', $select_difference, NULL, ['required' => 'required', 'class'=> 'form-control', 'placeholder'=> 'Rozdílnost požložek']) }}</div>
    </div>
    <div class="row" style="margin-bottom: 5px">
        <div class="col-lg-4">
            {{ Form::select('dev_id', $select_dev, $cpm->getProdDevId(), ['id'=> 'dev_id', 'required' => 'required', 'class'=> 'form-control']) }}
        </div>
        <div class="col-lg-4">
            {{ Form::select('warranty_id', $select_warranty, NULL, ['required' => 'required', 'class'=> 'form-control']) }}
        </div>
        <div class="col-lg-4">
            <div class="input-group btn-group-justified">
                <span class="btn-group">{{ Form::select('sale_id', $select_sale, NULL, ['required' => 'required', 'class'=> 'form-control']) }}</span>
                <span class="btn-group">{{ Form::select('mode_id', $select_mode, $cpm->getProdModeId(), ['required' => 'required', 'class'=> 'form-control']) }}</span>
            </div>
        </div>
    </div>
    <div class="row" style="margin-bottom: 5px">
        <div class="col-lg-8">{{ Form::text('name', $cpm->getProdName(), ['required' => 'required', 'maxlength' => '40', 'class'=> 'form-control', 'placeholder'=> 'Název produktu']) }}</div>
        <div class="col-lg-4">
            <div class="input-group btn-group-justified">
                <span class="input-group-addon"><i class="fa fa-money fa-lg" title="Cena, měna a DPH"></i></span>
                <span class="btn-group">{{ Form::number('price', $cpm->getProdPrice(), ['required' => 'required', 'min'=> '1', 'max'=>'9999999', 'class'=> 'form-control btn-group']) }}</span>
                <span class="btn-group">{{ Form::select('forex_id',$select_forex, NULL, ['required' => 'required', 'class'=> 'form-control']) }}</span>
                <span class="btn-group">{{ Form::select('dph_id',$select_dph, $cpm->getProdDphId(), ['required' => 'required', 'class'=> 'form-control', 'placeholder'=> 'Záruka produktu']) }}</span>
            </div>
        </div>
    </div>
    <div class="row" style="margin-bottom: 5px">
        <div class="col-lg-8">{{ Form::text('desc',$cpm->getProdDesc(),['required' => 'required', 'maxlength' => '128', 'class'=> 'form-control', 'placeholder'=> 'Popis produktu']) }}</div>
        <div class="col-lg-4">
            <div class="input-group btn-group-justified">
                <div class="input-group-addon"><i class="fa fa-car fa-lg" title="Typ nákladu"></i></div>
                <span class="btn-group">{{ Form::select('transport_atypical',['0' => 'Běžný rozměr', 1 => 'Atypický rozměr'], NULL, ['required' => 'required', 'class'=> 'form-control']) }}</span>
                <span class="btn-group">{{ Form::input('number','transport_weight', $cpm->getProdTransportWeight(), ['required' => 'required', 'min'=>'0', 'max'=>'9999', 'step' => '0.1', 'class'=> 'form-control']) }}</span>
                <div class="input-group-addon" title="Hmotnost produktu">kg</div>
            </div>
        </div>
    </div>
    <div class="row" style="margin-bottom: 5px">
        <div class="col-lg-4">
            {{ Form::text("code_prod", $cpm->getItemsCodeProd(), ['class'=> 'form-control', 'placeholder' => 'Kód produktu']) }}
        </div>
        <div class="col-lg-4">
            {{ Form::text("code_ean", $cpm->getItemsCodeEan(), ['class'=> 'form-control', 'placeholder' => 'EAN produktu']) }}
        </div>
        <div class="col-lg-4">
            {{ Form::select("availability_id", $select_availability, NULL, ['class' => 'form-control']) }}
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            {{ Form::select("data_title1", $select_media_var, $cpm->getProdDescriptionDataTitle1(), ['id' => 'data_title1','class' => 'form-control']) }}
        </div>
    </div>
    <div class="row" style="margin-bottom: 5px">
        <div class="col-lg-12">
            {{ Form::textarea('data_input1', $cpm->getProdDescriptionDataInput1(), ['size' => '180x13', 'class' => 'form-control' ]) }}
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            {{ Form::select("data_title2", $select_media_var, $cpm->getProdDescriptionDataTitle2(), ['id' => 'data_title2','class' => 'form-control']) }}
        </div>
    </div>
    <div class="row" style="margin-bottom: 5px">
        <div class="col-lg-12">
            {{ Form::textarea('data_input2', $cpm->getProdDescriptionDataInput2(), ['size' => '180x9', 'class' => 'form-control' ]) }}
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            {{ Form::select("data_title3", $select_media_var, $cpm->getProdDescriptionDataTitle3(), ['id' => 'data_title3','class' => 'form-control']) }}
        </div>
    </div>
    <div class="row" style="margin-bottom: 5px">
        <div class="col-lg-12">
            {{ Form::textarea('data_input3', $cpm->getProdDescriptionDataInput3(), ['size' => '180x5', 'class' => 'form-control' ]) }}
        </div>
    </div>

    <div id="img_rows">
        <div class="row">
            <div class="col-lg-11">
                {{ Form::url('urlimg', NULL, ['class'=> 'form-control', 'placeholder'=> 'URL obrázku nebo zdroj filtru']) }}
            </div>
            <div class="col-lg-1">
                <button type="button" onclick="addRow(this.form);" class="btn btn-default btn-sm">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </button>
            </div>
        </div>
    </div>

    <p class="text-center">
        {{ Form::submit('Přidat produkt', ['name' => 'button-submit-create', 'class' => 'btn btn-info']) }}
    </p>
    {{ Form::close() }}

    {{ Form::open(['route' => 'adm.product.prod.create', 'method'=>'GET', 'class' => 'form-horizontal', 'role' => 'form']) }}
    <div class="row" style="margin: 1.8em 0">
        <div class="col-lg-7">
            <div class="input-group">
                <span class="input-group-addon" id="sizing-addon2">{{ Form::label('grab_profile','Grab URL'); }}</span>
                {{ Form::url('urlimg', NULL, ['class'=> 'form-control', 'placeholder'=> 'URL zdroje filtru']) }}
            </div>
        </div>
        <div class="col-lg-5">
            <div class="input-group">
                {{ Form::select("grab_profile", $select_grab, NULL, ['id' => 'grab_profile','class' => 'form-control']) }}
                <span class="input-group-btn">
                    {{ Form::submit('Grab',['name' => 'grab_submit','class' => 'btn btn-sm btn-success']); }}
                </span>
            </div>
        </div>
    </div>
    {{ Form::close() }}
@stop
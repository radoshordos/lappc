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
            $( "div#prod_picture" ).hide();
            $( "#shower" ).click(function() {
                $( "div#prod_picture" ).show();
            });
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
            $("#warranty_id").select2({});
            $("#difference_id").select2({});
            $("#sale_id").select2({});
            $("#mode_id").select2({});
            $("#data_title1").select2({});
            $("#data_title2").select2({});
            $("#data_title3").select2({});
        });
    </script>
@stop

{{-- Content --}}
@section('content')
    {{ Form::open(['route' => 'adm.product.prod.store','class' => 'form-horizontal', 'role' => 'form']) }}
    <div class="row" style="margin-bottom: 5px">
        <div class="col-lg-8">{{ Form::select('tree_id', $select_tree, NULL, ['id'=> 'tree_id', 'required' => 'required', 'class'=> 'form-control']) }}</div>
        <div class="col-lg-4">{{ Form::select('difference_id', $select_difference, NULL, ['id'=> 'difference_id','required' => 'required', 'class'=> 'form-control', 'placeholder'=> 'Rozdílnost položek']) }}</div>
    </div>
    <div class="row" style="margin-bottom: 5px">
        <div class="col-lg-4">
            {{ Form::select('dev_id', $select_dev, $cpm->getProdDevId(), ['id'=> 'dev_id', 'required' => 'required', 'class'=> 'form-control']) }}
        </div>
        <div class="col-lg-4">
            {{ Form::select('warranty_id', $select_warranty, $cpm->getProdWarrantyId(),['id' => 'warranty_id', 'required' => 'required', 'class'=> 'form-control']) }}
        </div>
        <div class="col-lg-4">
            <div class="input-group btn-group-justified">
                <span class="btn-group">{{ Form::select('sale_id', $select_sale, $cpm->getProdSaleId(), ['id' => 'sale_id','required' => 'required', 'class'=> 'form-control']) }}</span>
                <span class="btn-group">{{ Form::select('mode_id', $select_mode, $cpm->getProdModeId(), ['id' => 'mode_id','required' => 'required', 'class'=> 'form-control']) }}</span>
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
            {{ Form::select("availability_id", $select_availability, $cpm->getItemsAvailabilityId(), ['class' => 'form-control']) }}
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            {{ Form::select("data_title1", $select_media_var, $cpm->getProdDescriptionDataTitle1(), ['id' => 'data_title1','class' => 'form-control']) }}
        </div>
    </div>
    <div class="row" style="margin-bottom: 5px">
        <div class="col-lg-12">
            {{ Form::textarea('data_input1', $cpm->getProdDescriptionDataInput1(), ['size' => '180x14', 'class' => 'form-control' ]) }}
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            {{ Form::select("data_title2", $select_media_var, $cpm->getProdDescriptionDataTitle2(), ['id' => 'data_title2','class' => 'form-control']) }}
        </div>
    </div>
    <div class="row" style="margin-bottom: 5px">
        <div class="col-lg-12">
            {{ Form::textarea('data_input2', $cpm->getProdDescriptionDataInput2(), ['size' => '180x10', 'class' => 'form-control' ]) }}
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
                {{ Form::url('prod_picture00', $cpm->getProdPicture00(), ['class'=> 'form-control','required' => 'required', 'placeholder'=> 'URL hlavního obrázku']) }}
            </div>
            <div class="col-lg-1">
                <button type="button" id="shower" class="btn btn-default btn-sm">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </button>
            </div>
        </div>
    </div>

    <div id="prod_picture">
        @for ($i = 1; $i < 13; $i++)
            <?php $gpp = "getProdPicture".str_pad($i, 2 , "0", STR_PAD_LEFT); ?>
            <div class="row">
                <div class="col-lg-11">
                    <div class="input-group">
                        <span class="input-group-addon">{{ Form::label('prod_picture1',"IMG ".str_pad($i, 2 , "0", STR_PAD_LEFT)); }}</span>
                        {{ Form::url("prod_picture$i", $cpm->$gpp(), ['class'=> 'form-control']); }}
                    </div>
                </div>
            </div>
        @endfor
    </div>

    <p class="text-center" style="margin: 1em">
        {{ Form::submit('Přidat produkt', ['name' => 'button-submit-create', 'class' => 'btn btn-info']) }}
    </p>
    {{ Form::close() }}

    {{ Form::open(['route' => 'adm.product.prod.create', 'method'=>'GET', 'class' => 'form-horizontal', 'role' => 'form']) }}
    <div class="row" style="margin: 1.8em 0">
        <div class="col-lg-7">
            <div class="input-group">
                <span class="input-group-addon" id="sizing-addon2">{{ Form::label('grab_profile','Grab URL'); }}</span>
                {{ Form::url('urlimg', NULL, ['class'=> 'form-control', 'required' => 'required', 'placeholder'=> 'URL zdroje filtru']) }}
            </div>
        </div>
        <div class="col-lg-5">
            <div class="input-group">
                {{ Form::select("grab_profile", $select_grab, NULL, ['id' => 'grab_profile','required' => 'required', 'class' => 'form-control']) }}
                <span class="input-group-btn">
                    {{ Form::submit('Grab',['name' => 'grab_submit','class' => 'btn btn-sm btn-success']); }}
                </span>
            </div>
        </div>
    </div>
    {{ Form::close() }}
@stop
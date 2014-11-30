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
{{ Form::model($prod, ['method'=>'PATCH','route' => ['adm.product.prod.update',$choice_tree, $choice_prod],'class'=>'form-horizontal','role'=>'form','files'=> true]) }}

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
        <div class="tab-pane active container" style="padding-top: 2em" id="prod">

        <div class="row">
            <div class="col-xs-12 col-md-8">
                <div class="form-group">
                    {{ Form::label('tree_id', 'Skupina', ['class'=> 'col-sm-2 control-label']) }}
                    <div class="col-sm-10">
                        {{ Form::select('tree_id', $select_tree, NULL, ['required' => 'required', 'class'=> 'form-control']) }}
                    </div>
                </div>
            </div>
            <div class="col-xs-6 col-md-4">
                <div class="form-group">
                    <div class="col-sm-12">
                        <div class="input-group">
                            <span class="input-group-addon">Typ</span>
                            {{  Form::select('difference_id', $select_difference, NULL, ['required' => 'required', 'class'=> 'form-control', 'placeholder'=> 'Rozdílnost požložek']) }}
                            <span class="input-group-addon alert-danger">
                                {{ Form::checkbox('difference_check')  }}
                            </span>
                         </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12 col-md-8">
                <div class="form-group">
                    {{ Form::label('dev_id', 'Výrobce', ['class'=> 'col-sm-2 control-label']) }}
                    <div class="col-sm-10">
                        <div class="input-group btn-group-justified">
                            <span class="btn-group">{{ Form::select('dev_id', $select_dev, NULL, ['required' => 'required', 'class'=> 'col-sm-2 form-control']) }}</span>
                            <span class="btn-group">{{ Form::select('warranty_id', $select_warranty, NULL, ['required' => 'required', 'class'=> 'form-control', 'placeholder'=> 'Záruka produktu']) }}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <div class="col-sm-12">
                        <div class="input-group btn-group-justified">
                            <span class="btn-group">{{ Form::select('sale_id', $select_sale, NULL, ['required' => 'required', 'class'=> 'form-control']) }}</span>
                            <span class="btn-group">{{ Form::select('mode_id', $select_mode, NULL, ['required' => 'required', 'class'=> 'form-control']) }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8">
                <div class="form-group">
                    {{ Form::label('name', 'Název', ['class'=> 'col-sm-2 control-label']) }}
                    <div class="col-sm-10">
                        <div class="input-group btn-group-justified">
                            <span class="btn-group">{{ Form::text('name', NULL, ['required' => 'required', 'maxlength' => '40', 'class'=> 'form-control', 'placeholder'=> 'Název produktu']) }}</span>
                            <span class="btn-group">{{ Form::text('alias', NULL, ['required' => 'required', 'maxlength' => '40', 'class'=> 'form-control', 'placeholder'=> 'Alias produktu']) }}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <div class="col-sm-12">
                        <div class="input-group btn-group-justified">
                            <span class="input-group-addon"><i class="fa fa-money fa-lg" title="Cena, měna a DPH"></i></span>
                            <span class="btn-group">{{ Form::number('price', round($prod['price'],$prod->forex->round_with), ['required' => 'required', 'min'=> '1', 'max'=>'9999999', 'step' => $prod->forex->step, 'class'=> 'form-control btn-group']) }}</span>
                            <span class="btn-group">{{ Form::select('forex_id',$select_forex, NULL, ['required' => 'required', 'class'=> 'form-control']) }}</span>
                            <span class="btn-group">{{ Form::select('dph_id',$select_dph, NULL, ['required' => 'required', 'class'=> 'form-control', 'placeholder'=> 'Záruka produktu']) }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8">
                <div class="form-group">
                    {{ Form::label('desc','Popis',['class'=> 'col-sm-2 control-label']) }}
                    <div class="col-sm-10">
                        {{ Form::text('desc',NULL,['required' => 'required', 'maxlength' => '80', 'class'=> 'form-control', 'placeholder'=> 'Popis produktu']) }}
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <div class="col-sm-12">
                        <div class="input-group btn-group-justified">
                            <div class="input-group-addon"><i class="fa fa-car fa-lg" title="Typ nákladu"></i></div>
                            <span class="btn-group">{{ Form::select('transport_atypical',['0' => 'Běžný rozměr', 1 => 'Atypický rozměr'], NULL, ['required' => 'required', 'class'=> 'form-control']) }}</span>
                            <span class="btn-group">{{ Form::input('number','transport_weight', round($prod['transport_weight'],2), ['required' => 'required', 'min'=>'0', 'max'=>'9999', 'step' => '0.1', 'class'=> 'form-control']) }}</span>
                            <div class="input-group-addon" title="Hmotnost produktu">kg</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if ($prod->ic_all > 0)
        <div class="row">
            <table class="table table-bordered table-striped" style="margin-top:4px;margin-bottom:4px">
                <thead>
                    <tr style="background-color: #CCCCCC">
                        <th class="text-center">Zobrazit</th>
                        @if ($prod->prodDifference->count > 0)
                        <th colspan="{{ $prod->prodDifference->count }}" class="text-center">Rozdílnosti</th>
                        @endif
                        <th>Kód</th>
                        <th>EAN</th>
                        <th>Dostupnost</th>
                        <th><span class="glyphicon glyphicon-remove"></span></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($table_items as $item)
                    <tr>
                        <td>{{ Form::select("visible[$item->id]", ['0' => 'NE', '1' => 'ANO'], $item->visible, ['class' => 'form-control']) }}</td>
                        @if ($prod->prodDifference->count > 0)
                        <td>{{ Form::text("diff1[$item->id]", $item->diff1, ['class'=> 'form-control']) }}</td>
                        @endif
                        @if ($prod->prodDifference->count > 1)
                        <td>{{ Form::text("diff2[$item->id]", $item->diff2, ['class'=> 'form-control']) }}</td>
                        @endif
                        <td>{{ Form::text("code_prod[$item->id]", $item->code_prod, ['class'=> 'form-control']) }}</td>
                        <td>{{ Form::text("code_ean[$item->id]", $item->code_ean, ['class'=> 'form-control']) }}</td>
                        <td>{{ Form::select("availability_id[$item->id]", $select_availability, $item->availability_id, ['class' => 'form-control']) }}</td>
                        <td>{{ Form::checkbox('item[$item->id]') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endif
        <p class="text-center">
            @if ($prod->mode_id == 1)
                {{ Form::submit('Smazat produkt', ['name' => 'button-submit-delete-prod','class' => 'btn btn-danger','style' => 'margin-right:5em']) }}
            @elseif ($prod->mode_id > 1 && $prod->ic_all > 0)
                {{ Form::submit('Smazat položku', ['name' => 'button-submit-delete-item','class' => 'btn btn-danger','style' => 'margin-right:5em']) }}
            @endif
            {{ Form::submit('Editovat produkt', ['name' => 'button-submit-edit','class' => 'btn btn-info','style' => 'margin-left:5em']) }}
        </p>
    </div>
    <div class="tab-pane" style="padding-top: 2em" id="source">
        {{ Form::hidden('data_id1', (isset($table_prod_description[0]) ? $table_prod_description[0]->id : NULL)); }}
        {{ Form::select("data_title1", $select_media_var, (isset($table_prod_description[0]) ? $table_prod_description[0]->variations_id : NULL), ['id' => 'data_title1','class' => 'form-control']) }}
        {{ Form::textarea('data_input1', (isset($table_prod_description[0]) ? $table_prod_description[0]->data : NULL), ['size' => '180x13', 'class' => 'form-control' ]) }}
        {{ Form::hidden('data_id2', (isset($table_prod_description[1]) ? $table_prod_description[1]->id : NULL)); }}
        {{ Form::select("data_title2", $select_media_var, (isset($table_prod_description[1]) ? $table_prod_description[1]->variations_id : NULL), ['id' => 'data_title2','class' => 'form-control']) }}
        {{ Form::textarea('data_input2', (isset($table_prod_description[1]) ? $table_prod_description[1]->data : NULL), ['size' => '180x9', 'class' => 'form-control' ]) }}
        {{ Form::hidden('data_id3', (isset($table_prod_description[2]) ? $table_prod_description[2]->id : NULL)); }}
        {{ Form::select("data_title3", $select_media_var, (isset($table_prod_description[2]) ? $table_prod_description[2]->variations_id : NULL), ['id' => 'data_title3','class' => 'form-control']) }}
        {{ Form::textarea('data_input3', (isset($table_prod_description[2]) ? $table_prod_description[2]->data : NULL), ['size' => '180x5', 'class' => 'form-control' ]) }}
    </div>
    @if ($prod->difference_id > 1)
    <div class="tab-pane" id="difference" style="padding-top: 2em">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th class="text-center" colspan="{{ $prod->prodDifference->count; }}">{{ $select_difference[$prod->prodDifference->id]; }}</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <td class="text-center" colspan="{{$prod->prodDifference->count; }}">{{ Form::submit('Přidat nové variace', ['name' => 'button-add-variation','class' => 'btn btn-info']) }}</td>
                </tr>
            </tfoot>
            <tbody>
                <tr>
                @foreach ($table_prod_description_set as $value)
                    <?php $pdv = Authority\Eloquent\ProdDifferenceValues::where('set_id', '=', $value->set_id)->orderBy($value->prodDifferenceSet->sortby)->get(['id', 'name']); ?>
                    <td>{{ Form::select('variation['.$value->set_id.']['.$value->pds_id.']',\Authority\Tools\SB::optionBind('SELECT * FROM prod_difference_values WHERE set_id = ?', [$value->set_id] ,['id' => '->name']),NULL, ['multiple' => 'multiple', 'size' => '36','class' => 'form-control']); }}</td>
                @endforeach
                </tr>
            </tbody>
        </table>
    </div>
    @endif
    <div class="tab-pane" id="aktivita" style="padding-top: 2em">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">O produktu</h3>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-3">Vyrvořeno</div>
                    <div class="col-xs-9">{{ $prod->created_at }}</div>
                </div>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-3">Upraveno</div>
                    <div class="col-xs-9"></div>
                </div>
            </div>
        </div>
        @if (isset($prod->akce->akce_prod_id))
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">O aktuální akci</h3>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-3">Vyrvořeno</div>
                    <div class="col-md-9">{{ $prod->akce->created_at }}</div>
                </div>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-3">Upraveno</div>
                    <div class="col-md-9"></div>
                </div>
            </div>
        </div>
        @endif
    </div>
    <div class="tab-pane" id="fotogalerie" style="padding-top: 2em">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Upload obrázku</h3>
            </div>
            <div class="panel-body">
                <div class="row col-sm-offset-1 col-md-9">
                    {{ Form::label('input-1a','Vyber soubor') }}
                    {{ Form::file('input-1a',['id' => 'input-1a', 'data-show-preview' => 'false', 'class'=> 'file']) }}
                </div>
                <div class="row col-sm-offset-1 col-md-9">
                    {{ Form::label('upload_url','Zadej URL') }}
                    <div class="input-group">
                        {{ Form::text('upload_url', NULL, ['class'=> 'form-control']) }}
                        <span class="input-group-btn">
                            {{ Form::submit('Zpracovat obrázek', ['name' => 'picture-work','class'=> 'form-control btn-success']) }}
                        </span>
                    </div>
                </div>
            </div>
        </div>
        @if ($prod->picture_count > 0)
            <div class="well well-lg">
            @foreach($table_prod_picture as $row)
                <img src="{{ '/web/naradi/'.$prod->tree->absolute."/".$row->img_normal }}" class="img-thumbnail" alt="{{ $row->img_normal }}" />
            @endforeach
            </div>
        @endif
    </div>

    @if ($prod->mode_id == 4 && isset($prod->akce->akce_prod_id))
    <div class="tab-pane" id="akce" style="padding-top: 2em">


        {{ Form::model($prod, ['method'=>'PATCH','route' => ['adm.product.prod.update',$choice_tree, $choice_prod],'class'=>'form-horizontal','role'=>'form']) }}

        <div class="panel panel-primary">
            {{ Form::hidden('akce_id',$prod->akce->akce_id);  }}
            {{ Form::hidden('akce_prod_id',$prod->id);  }}
            <div class="panel-heading">
                <h3 class="panel-title">Akce produktu {{ $prod->name  }}</h3>
            </div>
            <div class="panel-body">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-2">{{ Form::label('akce_template_id','Šablona') }}</div>
                        @if (isset($select_akce_template))
                        <div class="col-md-10">{{ Form::select('akce_template_id', $select_akce_template, $prod->akce->akce_template_id, ['class'=> 'form-control']); }}</div>
                        @endif
                    </div>
                    <div class="row" style="margin-top: 2em">
                        <div class="col-md-2">{{ Form::label('akce_price','Akční cena v '. $prod->forex->currency) }}</div>
                        <div class="col-md-2">{{ Form::number('akce_price', round($prod['price'],$prod->forex->round_with) , ['min'=> '1', 'max'=> $prod->price, 'step' => $prod->forex->step, 'class'=> 'form-control btn-group']) }}</div>
                        <div class="col-md-2">{{ Form::label('vprice','Běžná cena v '. $prod->forex->currency) }}</div>
                        <div class="col-md-2">{{ Form::number('vprice', round($prod['price'],$prod->forex->round_with) , ['readonly' => 'readonly', 'min'=> '1', 'max'=> $prod->price, 'step' => $prod->forex->step, 'class'=> 'form-control btn-group']) }}</div>
                    </div>
                    <div class="row" style="margin-top: 2em">
                    </div>
                </div>
            </div>
        </div>
        @if (count($table_items)>0)
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Akce položek produktu {{ $prod->name }}</h3>
            </div>
            <div class="panel-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th rowspan="2">#ID</th>
                            <th rowspan="2">Kód</th>
                            <th colspan="2">Sleva</th>
                            <th colspan="2">Dostupnost</th>
                            <th></th>
                        </tr>
                        <tr>
                            <th>Prod</th>
                            <th>Akce</th>
                            <th>Prod</th>
                            <th>Akce</th><th>Cena v {{$prod->forex->currency}}</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($table_items as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->code_prod }}</td>
                            <td>{{ Form::text('virtual_item_availability[$item->id]', $item->itemsAvailability->name, ['readonly' => 'readonly', 'class'=> 'form-control btn-group']) }}</td>
                            <td>{{ Form::select("ai_availability_id[$item->id]", $select_availability_action, NULL, ['class' => 'form-control']) }}</td>
                        </tr>
                    @endforeach
                        <tr>
                            <td colspan="3"><strong>GLOBAL RESET</strong></td>
                            <td></td>
                            <td>{{ Form::select('global_availability', [''] + $select_availability_action, NULL, ['class' => 'form-control']); }}</td>
                            <td>{{ Form::number('global_iprice', NULL, ['min'=> '0', 'max'=>'9999999', 'step' => $prod->forex->step, 'class'=> 'form-control btn-group']); }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            </div>
            <p class="text-center">
            {{ Form::submit('Uložit akci',['name' => 'save-action','class' => 'btn btn-success']); }}
            </p>
            @endif
        </div>
    </div>
    @endif
</div>
{{ Form::close() }}
@endif
@stop
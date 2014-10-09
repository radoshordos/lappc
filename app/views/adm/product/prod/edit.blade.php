@extends('adm.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent Editace produktu @stop

{{-- JavaScript on page --}}
@section ('script')
<link rel="stylesheet" href="{{ asset('admin/components/bootstrap-fileinput/css/fileinput.min.css') }}">
<script src="{{ asset('admin/components/bootstrap-fileinput/js/fileinput.min.js') }}"></script>
<script>
    $(document).ready(function () {
        $("#list_tree").select2({});
        $("#list_prod").select2({});
        $("#tree_id").select2({});
        $("#dev_id").select2({});
        $('#myTab a').click(function (e) {
          e.preventDefault()
          $(this).tab('show')
        })
        $('#myTab a[href="#profile"]').tab('show');
    });
</script>
@stop

{{-- Content --}}


@section('content')
{{ Form::open(array('route' => array('adm.product.prod.edit', $choice_tree, $choice_prod))) }}
<div class="input-group form-group">
    <span class="input-group-addon">Skupina</span>
    {{ Form::select('list_tree',$list_tree, $choice_tree, array('id' => 'list_tree', 'class'=> 'form-control', 'onchange' => 'this.form.submit()')) }}
</div>

@if (isset($list_prod) && !empty($list_prod))
<div class="input-group form-group">
    <span class="input-group-addon">Produkt</span>
    {{ Form::select('list_prod',$list_prod, $choice_prod, array('id' => 'list_prod','class'=> 'form-control', 'onchange' => 'this.form.submit()')) }}
</div>
<br />
@endif
{{ Form::close() }}

@if (isset($prod))
{{ Form::model($prod, array('method'=>'PATCH','route' => array('adm.product.prod.update',$choice_tree, $choice_prod),'class'=>'form-horizontal','role'=>'form')) }}

<div id="content">
    <ul id="tabs" class="nav nav-tabs container" data-tabs="tabs">
        <li class="active"><a href="#prod" data-toggle="tab">Produkt</a></li>
        <li><a href="#source" data-toggle="tab">Obsah</a></li>
        @if ($prod->difference_id > 1)
        <li><a href="#difference" data-toggle="tab">Variace</a></li>
        @endif
        <li><a href="#fotogalerie" data-toggle="tab">Fotogalerie</a></li>
        @if ($prod->mode_id == 4)
        <li><a href="#akce" data-toggle="tab">Akce</a></li>
        @endif
    </ul>
    <div id="my-tab-content" class="tab-content">
        <div class="tab-pane active container" style="padding-top: 2em" id="prod">

        <div class="row">
            <div class="col-xs-12 col-md-8">
                <div class="form-group">
                    {{ Form::label('tree_id', 'Skupina', array('class'=> 'col-sm-2 control-label')) }}
                    <div class="col-sm-10">
                        {{ Form::select('tree_id', $select_tree, NULL, array('required' => 'required', 'class'=> 'form-control')) }}
                    </div>
                </div>
            </div>
            <div class="col-xs-6 col-md-4">
                <div class="form-group">
                    <div class="col-sm-12">
                        <div class="input-group">
                            <span class="input-group-addon">Typ</span>
                            {{  Form::select('difference_id', $select_difference, NULL, array('required' => 'required', 'class'=> 'form-control', 'placeholder'=> 'Rozdílnost požložek')) }}
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
                    {{ Form::label('dev_id', 'Výrobce', array('class'=> 'col-sm-2 control-label')) }}
                    <div class="col-sm-10">
                        <div class="input-group btn-group-justified">
                            <span class="btn-group">{{ Form::select('dev_id', $select_dev, NULL, array('required' => 'required', 'class'=> 'col-sm-2 form-control')) }}</span>
                            <span class="btn-group">{{ Form::select('warranty_id', $select_warranty, NULL, array('required' => 'required', 'class'=> 'form-control', 'placeholder'=> 'Záruka produktu')) }}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-6 col-md-4">
                <div class="form-group">
                    <div class="col-sm-12">
                        <div class="input-group">
                            <span class="input-group-addon">Stav</span>
                            {{ Form::select('mode_id', $select_mode, NULL, array('required' => 'required', 'class'=> 'form-control')) }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8">
                <div class="form-group">
                    {{ Form::label('name', 'Název', array('class'=> 'col-sm-2 control-label')) }}
                    <div class="col-sm-10">
                        <div class="input-group btn-group-justified">
                            <span class="btn-group">{{ Form::text('name', NULL, array('required' => 'required', 'maxlength' => '40', 'class'=> 'form-control', 'placeholder'=> 'Název produktu')) }}</span>
                            <span class="btn-group">{{ Form::text('alias', NULL, array('required' => 'required', 'maxlength' => '40', 'class'=> 'form-control', 'placeholder'=> 'Alias produktu')) }}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <div class="col-sm-12">
                        <div class="input-group btn-group-justified">
                            <span class="input-group-addon"><i class="fa fa-money fa-lg" title="Cena, měna a DPH"></i></span>
                            <span class="btn-group">{{ Form::input('number','price', round($prod['price'],$prod->forex->round_with), ['required' => 'required', 'min'=> '1', 'max'=>'9999999', 'step' => $prod->forex->step, 'class'=> 'form-control btn-group']) }}</span>
                            <span class="btn-group">{{ Form::select('forex_id',$select_forex, NULL, array('required' => 'required', 'class'=> 'form-control')) }}</span>
                            <span class="btn-group">{{ Form::select('dph_id',$select_dph, NULL, array('required' => 'required', 'class'=> 'form-control', 'placeholder'=> 'Záruka produktu')) }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8">
                <div class="form-group">
                    {{ Form::label('desc','Popis',array('class'=> 'col-sm-2 control-label')) }}
                    <div class="col-sm-10">
                        {{ Form::text('desc',NULL,array('required' => 'required', 'maxlength' => '80', 'class'=> 'form-control', 'placeholder'=> 'Popis produktu')) }}
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <div class="col-sm-12">
                        <div class="input-group btn-group-justified">
                            <div class="input-group-addon"><i class="fa fa-car fa-lg" title="Typ nákladu"></i></div>
                            <span class="btn-group">{{ Form::select('transport_atypical',['0' => 'Běžný rozměr', 1 => 'Atypický rozměr'], NULL, array('required' => 'required', 'class'=> 'form-control')) }}</span>
                            <span class="btn-group">{{ Form::input('number','transport_weight', round($prod['transport_weight'],2), array('required' => 'required', 'min'=>'0', 'max'=>'9999', 'step' => '0.1', 'class'=> 'form-control')) }}</span>
                            <div class="input-group-addon" title="Hmotnost produktu">kg</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if ($prod->ic_all > 0)
        <div class="row">
            <table style="margin-top:4px;margin-bottom:4px">
                <thead>
                    <tr>
                        <th>Zobrazit</th>
                        <th colspan="2" class="text-center">Rozdílnosti</th>
                        <th>Kód</th>
                        <th>EAN</th>
                        <th>Sleva</th>
                        <th>Dostupnost</th>
                        <th>Cena</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($table_items as $item)
                    <tr>
                        <td>{{ Form::select("visible[$item->id]", ['0' => 'NE', '1' => 'ANO'], $item->visible, ['class' => 'form-control']) }}</td>
                        <td>{{ Form::text("diff1[$item->id]", $item->diff1, ['class'=> 'form-control']) }}</td>
                        <td>{{ Form::text("diff2[$item->id]", $item->diff2, ['class'=> 'form-control']) }}</td>
                        <td>{{ Form::text("code_prod[$item->id]", $item->code_prod, ['class'=> 'form-control']) }}</td>
                        <td>{{ Form::text("code_ean[$item->id]", $item->code_ean, ['class'=> 'form-control']) }}</td>
                        <td>{{ Form::select("sale_id[$item->id]", $select_sale, $item->sale_id, ['class' => 'form-control']) }}</td>
                        <td>{{ Form::select("availability_id[$item->id]", $select_availability, $item->availability_id, ['class' => 'form-control']) }}</td>
                        <td>{{ Form::input('number',"iprice[$item->id]", round($item->iprice,$prod->forex->round_with), ['required' => 'required', 'min'=> '0', 'max'=>'9999999', 'step' => $prod->forex->step, 'class'=> 'form-control btn-group']) }}</td>
                        <td>{{ Form::checkbox('item[$item->id]') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endif
    </div>
    <div class="tab-pane" style="padding-top: 2em" id="source">
        {{ Form::hidden('data_id1', (isset($table_prod_description[0]) ? $table_prod_description[0]->id : NULL)); }}
        {{ Form::select("data_title1", $select_media_var, (isset($table_prod_description[0]) ? $table_prod_description[0]->variations_id : NULL), ['class' => 'form-control']) }}
        {{ Form::textarea('data_input1', (isset($table_prod_description[0]) ? $table_prod_description[0]->data : NULL), ['size' => '180x13', 'class' => 'form-control' ]) }}
        {{ Form::hidden('data_id2', (isset($table_prod_description[1]) ? $table_prod_description[1]->id : NULL)); }}
        {{ Form::select("data_title2", $select_media_var, (isset($table_prod_description[1]) ? $table_prod_description[1]->variations_id : NULL), ['class' => 'form-control']) }}
        {{ Form::textarea('data_input2', (isset($table_prod_description[1]) ? $table_prod_description[1]->data : NULL), ['size' => '180x9', 'class' => 'form-control' ]) }}
        {{ Form::hidden('data_id3', (isset($table_prod_description[2]) ? $table_prod_description[2]->id : NULL)); }}
        {{ Form::select("data_title3", $select_media_var, (isset($table_prod_description[2]) ? $table_prod_description[2]->variations_id : NULL), ['class' => 'form-control']) }}
        {{ Form::textarea('data_input3', (isset($table_prod_description[2]) ? $table_prod_description[2]->data : NULL), ['size' => '180x5', 'class' => 'form-control' ]) }}
    </div>
    @if ($prod->difference_id > 1)
    <div class="tab-pane" id="difference" style="padding-top: 2em">

                    <table>
                        <thead>
                            <tr>
                                <th colspan="<?=  $prod->prodDifference->count; ?>"><?= $select_difference[$prod->prodDifference->id]; ?></th>
                            </tr>
                            <tr>
                                <?php /* foreach ($pdis as $value) { */ ?>
                                    <td><? /* $value->pds_name; */?></td>
                                <?php /* } */ ?>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <td colspan="<?/*= $prod->pd_lenght;*/ ?>"><?/*= $this->formSubmit("addvar", "Přidat variace"); */?></td>
                            </tr>
                        </tfoot>
                        <tbody>
                            <tr>
                                <?php /* foreach ($pdis as $value) { */ ?>
                                    <td>
                                        <?php /*
                                        $pdv = Model_Zendb::zFormOption($db->select()
                                                                ->from("prod2difference2values", array("pdv_id", "pdv_name"))
                                                                ->where("pdv_id_set=?", intval($value->pdis_id_set))
                                                                ->order(array($value->pds_sortby)), array('->pdv_id', '->pdv_name'));

                                        echo $this->formSelect("modi[$value->pds_id]", $prod->prod_id_dev, array("multiple" => "multiple", "size" => "50"), $pdv);
                                        */?>
                                    </td>
                                <?php /* } */ ?>
                            </tr>
                        </tbody>
                    </table>
    </div>
    @endif
    <div class="tab-pane" id="fotogalerie" style="padding-top: 2em">
        <div class="row">
            <div class="col-sm-8">
                <label class="control-label">Select File</label>
                <input id="input-1a" type="file" class="file" data-show-preview="false">
            </div>
        </div>
    </div>
    @if ($prod->mode_id == 4)
    <div class="tab-pane" id="akce" style="padding-top: 2em">
        <h1>akce</h1>
        <p>akce akce akce akce akce akce</p>
    </div>
    @endif
</div>
{{ Form::close() }}
<p class="text-center">
    @if ($prod->mode_id == 1)
        {{ Form::submit('Smazat produkt', array('name' => 'button-submit-delete-prod','class' => 'btn btn-danger','style' => 'margin-right:5em')) }}
    @elseif ($prod->mode_id > 1 && $prod->ic_all > 0)
        {{ Form::submit('Smazat položku', array('name' => 'button-submit-delete-item','class' => 'btn btn-danger','style' => 'margin-right:5em')) }}
    @endif
    {{ Form::submit('Editovat produkt', array('name' => 'button-submit-edit','class' => 'btn btn-info','style' => 'margin-left:5em')) }}
</p>
@endif
@stop
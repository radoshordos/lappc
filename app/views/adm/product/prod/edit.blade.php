@extends('adm.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent Editace produktu @stop

{{-- JavaScript on page --}}
@section ('script')
<script>
    $(document).ready(function () {
        $("#list_tree").select2({});
        $("#list_prod").select2({});
        $("#tree_id").select2({});
        $("#dev_id").select2({});
    });
</script>
@stop

{{-- Content --}}
@section('content')
<div id="lasmall">
{{ Form::open(array('method' => 'POST','action' => array('ProdController@edit', $choice_prod, "tree_id=".$choice_tree))) }}
<table class="table table-striped table-bordered table-condensed">
    <tbody>
    <tr>
        <th>Skupina</th>
        <td>
        {{ Form::select('list_tree',$list_tree, $choice_tree, array('id' => 'list_tree', 'class'=> 'form-control', 'onchange' => 'this.form.submit()')) }}
        </td>
    </tr>
    <tr>
        <th>Produkt</th>
        <td>
        @if (isset($list_prod) && !empty($list_prod))
            {{ Form::select('list_prod',$list_prod, $choice_prod, array('id' => 'list_prod','class'=> 'form-control', 'onchange' => 'this.form.submit()')) }}
        @endif
        </td>
    </tr>
    </tbody>
</table>
{{ Form::close() }}

@if (isset($prod))
{{ Form::model($prod, array('method'=>'PATCH','route' => array('adm.product.prod.update',$prod->id),'class'=>'form-horizontal','role'=>'form')) }}

<div class="row">
    <div class="col-xs-12 col-md-8">
        <div class="form-group">
            {{ Form::label('tree_id','Skupina',array('class'=> 'col-sm-2 control-label')) }}
            <div class="col-sm-10">
                {{ Form::select('tree_id',$select_tree, NULL, array('required' => 'required', 'class'=> 'form-control')) }}
            </div>
        </div>
    </div>
    <div class="col-xs-6 col-md-4">
        <div class="form-group">
            {{ Form::label('warranty_id','Záruka',array('class'=> 'col-sm-2 control-label')) }}
            <div class="col-sm-10">
                {{ Form::select('warranty_id',$select_warranty, NULL, array('required' => 'required', 'class'=> 'form-control', 'placeholder'=> 'Záruka produktu')) }}
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-md-8">
        <div class="form-group">
            {{ Form::label('dev_id','Výrobce',array('class'=> 'col-sm-2 control-label')) }}
            <div class="col-sm-10">
                {{ Form::select('dev_id',$select_dev, NULL, array('required' => 'required', 'class'=> 'form-control')) }}
            </div>
        </div>
    </div>
    <div class="col-xs-6 col-md-4">
        <div class="form-group">
            {{-- Form::label('dph_id','DPH',array('class'=> 'col-sm-2 control-label')) --}}
            <div class="col-sm-10">
                {{--  Form::select('dph_id',$select_dph, NULL, array('required' => 'required', 'class'=> 'form-control', 'placeholder'=> 'Záruka produktu'))  --}}
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-xs-12 col-md-8">
        <div class="form-group">
            {{ Form::label('alias','Alias',array('class'=> 'col-sm-2 control-label')) }}
            <div class="col-sm-10">
                {{ Form::text('alias',NULL,array('required' => 'required', 'maxlength' => '40', 'class'=> 'form-control', 'placeholder'=> 'Alias produktu')) }}
            </div>
        </div>
    </div>
    <div class="col-xs-6 col-md-4">
       <div class="form-group">
            {{ Form::label('mode_id','Stav',array('class'=> 'col-sm-2 control-label')) }}
            <div class="col-sm-10">
                {{ Form::select('mode_id',$select_mode, NULL, array('required' => 'required', 'class'=> 'form-control')) }}
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-8">
        <div class="form-group">
            {{ Form::label('name','Název výrobce',array('class'=> 'col-sm-2 control-label')) }}
            <div class="col-sm-10">
                {{ Form::text('name',NULL,array('required' => 'required', 'maxlength' => '40', 'class'=> 'form-control', 'placeholder'=> 'Název produktu')) }}
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

<div class="row" style="border-top:4px solid #D9EDF7;border-bottom:4px solid #D9EDF7">
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
            <td>{{ Form::select("visible[$item->id]", ['0' => 'NE', '1' => 'ANO'], NULL, ['class' => 'form-control']) }}</td>
            <td>{{ Form::text("diff1[$item->id]", NULL, array('class'=> 'form-control')) }}
            <td>{{ Form::text("diff2[$item->id]", NULL, array('class'=> 'form-control')) }}
            <td>{{ Form::text("code_prod[$item->id]", $item->code_prod, array('class'=> 'form-control')) }}
            <td>{{ Form::text("code_ean[$item->id]", $item->code_ean, array('class'=> 'form-control')) }}
            <td>{{ Form::select("sale_id[$item->id]", $select_sale, NULL, ['class' => 'form-control']) }}</td>
            <td>{{ Form::select("availability_id[$item->id]", $select_availability, NULL, ['class' => 'form-control']) }}</td>
            <td>{{ Form::input('number',"iprice[$item->id]", round(NULL,$prod->forex->round_with), ['required' => 'required', 'min'=> '0', 'max'=>'9999999', 'step' => $prod->forex->step, 'class'=> 'form-control btn-group']) }}
        </tr>
        @endforeach
    </tbody>
</table>
</div>

<p class="text-center">
    {{ link_to_route('adm.product.prod.index','Zobrazit všechny produkty',NULL, array('class'=>'btn btn-primary','role'=> 'button')) }}
    {{ Form::submit('Editovat produkt', array('class' => 'btn btn-info')) }}
</p>
{{ Form::close() }}
</div>
@endif
@stop
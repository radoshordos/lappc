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
    @include('adm.product.prod.blade.button_submit')
</div>

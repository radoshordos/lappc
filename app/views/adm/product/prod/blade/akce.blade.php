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
                        <th>Akce</th>
                        <th>Cena v {{$prod->forex->currency}}</th>
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
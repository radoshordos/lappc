@extends('adm.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent Přehled produktů @stop

{{-- JavaScript on page --}}
@section ('script')
    <script>
        $(document).ready(function () {
            $("#select_tree").select2({
                placeholder: "Skupina",
                minimumResultsForSearch: 3,
                allowClear: true
            });
            $("#select_dev").select2({
                placeholder: "Výrobce",
                minimumResultsForSearch: 3,
                allowClear: true
            });
            $("#select_diff").select2({
                placeholder: "Rozdílnost",
                minimumResultsForSearch: 3,
                allowClear: true
            });
            $("#select_limit").select2({});
        });
    </script>
@stop

{{-- Content --}}
@section('content')
    {{ Form::open(['route' => ['adm.product.prod.index'],'method' => 'GET','class' => 'form-horizontal', 'role' => 'form']) }}
    <blockquote>
        <div class="row">
            <div class="col-xs-7">
                {{ Form::select('select_tree', $select_tree, $input_tree, ['id'=> 'select_tree', 'class'=> 'form-control']) }}
            </div>
            <div class="col-xs-3">
                {{ Form::select('select_dev', $select_dev, $input_dev, ['id'=> 'select_dev', 'class'=> 'form-control']) }}
            </div>
            <div class="col-xs-2">
                {{ Form::select('select_limit', ['5' => ' Limit 5','30' => ' Limit 30','90' => 'Limit 90'], $input_limit, ['id'=> 'select_limit', 'class'=> 'form-control']) }}
            </div>
        </div>
        <div class="row" style="margin-top: .5em">
            <div class="col-xs-7">
                {{ Form::select('select_sort', ['1' => 'Seřadit dle data poslední změny', '2' => 'Seřadit dle názvu', '3' => 'Seřadit dle ceny'], $input_sort, ['id'=> 'select_sort', 'class'=> 'form-control', 'onchange' => 'this.form.submit()']) }}
            </div>
            <div class="col-xs-3">
                {{ Form::select('select_diff', ['' => 'Rozdílnost'] + $select_diff, $input_diff, ['id'=> 'select_diff', 'class'=> 'form-control']) }}
            </div>
            <div class="col-xs-2">
                {{ Form::submit('Hledat',['name' => 'hledat','class'=> 'form-control btn-primary'])  }}
            </div>
        </div>
    </blockquote>

    @if ($view->count())
        <div class="row">
            <div class="col-md-12">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>#ID</th>
                            <th>#M</th>
                            <th>Výrobce</th>
                            <th>#TREE</th>
                            <th>Záruka</th>
                            <th>Prod<br />sleva</th>
                            <th class="text-right">Prod<br />cena</th>
                            <th class="col-xs-2">{{ Form::text('search_name',$search_name,['placeholder'=> 'Název']) }}</th>
                            <th>Final<br />sleva</th>
                            <th class="text-right">Final<br />cena</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($view as $row)
                        <?php $vpa = (new \Authority\Mapper\ViewProdMapper)->fetchRow($row); ?>
                        <tr>
                            <td>{{ $vpa->getProdId() }}</td>
                            <td>{{ $vpa->getProdModeId() }}</td>
                            <td>{{ $vpa->getDevName() }}</td>
                            <td>{{ $vpa->getTreeId() }}</td>
                            <td>{{ $vpa->getProdWarrantyName() }}</td>
                            <td>{{ $vpa->getProdSaleName(); }}</td>
                            <td class="col-xs-1 text-right">{{ $vpa->getProdPrice() }}</td>
                            <td class="col-xs-3">
                                <small>{{ link_to_route('adm.product.prod.edit', $vpa->getProdName()." [".$vpa->getProdIcAll()."]",[$vpa->getTreeId(),$vpa->getProdId()]) }}</small>
                            </td>
                            <td class="col-xs-1">{{ (($vpa->getProdPrice() - $vpa->getPrice()) / $vpa->getProdPrice()) * 100 }} %</td>
                            <td class="col-xs-1 text-right">{{ $vpa->priceFormatCurrencyWith() }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        {{ Form::close() }}
        <div class="text-center">
            {{ $view->appends(['select_tree' => $input_tree,'select_dev' => $input_dev,'select_limit' => $input_limit])->links(); }}
        </div>
    @endif
@stop
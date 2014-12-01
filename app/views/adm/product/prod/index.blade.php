@extends('adm.layouts.default')

{{-- Web site Title --}}
@section('title')
    @parent Přehled produktů @stop

{{-- JavaScript on page --}}
@section ('script')
    <script>
        $(document).ready(function () {
            $("#select_tree").select2({
                minimumResultsForSearch: 3,
                allowClear: true
            });
            $("#select_dev").select2({
                minimumResultsForSearch: 3,
                allowClear: true
            });
        });
    </script>
@stop

{{-- Content --}}
@section('content')
    {{ Form::open(['route' => ['adm.product.prod.index'],'method' => 'GET','class' => 'form-horizontal', 'role' => 'form']) }}
    <blockquote>
        <div class="row">
            <div class="col-xs-7">
                {{ Form::select('select_tree', ['' => 'Skupina'] + $select_tree, $input_tree, ['id'=> 'select_tree', 'class'=> 'form-control']) }}
            </div>
            <div class="col-xs-3">
                {{ Form::select('select_dev', ['' => 'Výrobce'] + $select_dev, $input_dev, ['id'=> 'select_dev', 'class'=> 'form-control']) }}
            </div>
            <div class="col-xs-2">
                {{ Form::select('select_limit', ['5' => ' Limit 5','30' => ' Limit 30','90' => 'Limit 90'], $input_limit, ['id'=> 'select_limit', 'class'=> 'form-control']) }}
            </div>
        </div>
        <div class="row" style="margin-top: .5em">
            <div class="col-xs-10">
                {{ Form::select('select_sort', ['1' => 'Seřadit dle data poslední změny', '2' => 'Seřadit dle názvu', '3' => 'Seřadit dle ceny'], $input_sort, array('id'=> 'select_sort', 'class'=> 'form-control', 'onchange' => 'this.form.submit()')) }}
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
                        <tr>
                            <td>{{ $row->prod_id }}</td>
                            <td>{{ $row->prod_mode_id }}</td>
                            <td>{{ $row->dev_name }}</td>
                            <td>{{ $row->tree_id }}</td>
                            <td>{{ $row->prodWarranty->name }}</td>
                            <td>{{ $row->prodSale->name }}</td>
                            <td class="col-xs-1 text-right">{{ $pf->priceWithCurrencyWith($row->prod->price,$row->prod->forex_id)  }}</td>
                            <td class="col-xs-3">
                                <small>{{ link_to_route('adm.product.prod.edit', $row->prod_name." [".$row->prod_ic_all."]",[$row->tree_id,$row->prod_id]) }}</small>
                            </td>
                            <td class="col-xs-1">{{ (($row->prod->price - $row->query_price) / $row->prod->price) * 100 }} %</td>
                            <td class="col-xs-1 text-right">{{ $pf->priceWithCurrencyWith($row->query_price,$row->prod_forex_id)  }}</td>
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
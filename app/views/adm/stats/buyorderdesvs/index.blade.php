@extends('adm.layouts.default')

{{-- Web site Title
http://stackoverflow.com/questions/2084519/how-to-create-a-query-for-monthly-total-in-mysql
--}}
@section('title')
@parent
Stav prodejů výrobců
@stop

{{-- JavaScript on page --}}
@section ('script')
    <script>
        $(document).ready(function () {
            $("#select_mixture_dev").select2({
                allowClear: true
            });
        });
    </script>
@stop

{{-- Content --}}
@section('content')
    {{ Form::open(['route' => ['adm.stats.buyorderdevs.index'], 'method' => 'GET', 'class' => 'form-horizontal', 'role' => 'form']) }}
    <table class="table">
        <thead>
            <tr>
                <th class="col-sm-3">{{ Form::label('month_start', 'Od měsíce') }}</th>
                <th class="col-sm-3">{{ Form::label('month_end', 'Do měsíce') }}</th>
                <th colspan="2">{{ Form::label('select_mixture_dev', 'Výrobce') }}</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ Form::input('month', 'month_start', $choice_month_start, ['class' => 'form-control', 'required' => 'required', 'min' => $min_insert_month, 'max' => date('Y-m')]) }}</td>
                <td>{{ Form::input('month', 'month_end', $choice_month_end, ['class' => 'form-control','required' => 'required', 'min' => $min_insert_month, 'max' => date('Y-m') ]) }}</td>
                <td>{{ Form::select('select_mixture_dev',$select_mixture_dev, $choice_mixture_dev, ['class'=> 'form-control', 'id' => 'select_mixture_dev']) }}</td>
                <td>{{ Form::submit('Zobrazit',['name' => 'zobrazit','class' => 'btn btn-success']) }}</td>
            </tr>
        </tbody>
    </table>
    </form>
    {{ Form::close() }}

    @if (count($buy_order_db_items)>0)
    <table class="table table-condensed">
        <thead>
            <tr>
				<th class="text-center">Období</th>
                <th class="text-center">Počet objednávek</th>
				<th class="text-center">&#8721; Ks</th>
                <th class="text-right">Koupeno</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <td class="text-right" colspan="4">Zobrazeno: <b>{{ count($buy_order_db_items); }}</b> záznamů</td>
            </tr>
        </tfoot>
        <tbody>
        <?php foreach ($buy_order_db_items as $bodi) { ?>
            <tr>
                <td class="text-center"><?= $bodi->month; ?></td>
				<td class="text-center"><?= $bodi->count_order; ?></td>
				<td class="text-center"><?= $bodi->sum_item; ?></td>
                <td class="text-right"><?= $bodi->price; ?></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
    @endif
@stop
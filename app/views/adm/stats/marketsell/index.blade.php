@extends('adm.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Statistiky produktů
@stop

{{-- JavaScript on page --}}
@section ('script')
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['M\u011bsíc', 'Cena celkem s dopravou', 'Cena celkem','Doprava'],
          @foreach($source as $val)
          [{{substr($val->_month, 0, 7)}},  {{ $val->price_all }},  {{ $val->result_price_only }},  {{ $val->price_transport }}],
          @endforeach
        ]);
        var options = {
          title: 'Prodeje obchodu'
        };
        var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
</script>
@stop

{{-- Content --}}
@section('content')
{{ Form::open(['route' => ['adm.stats.marketsell.index'], 'method' => 'GET', 'class' => 'form-horizontal', 'role' => 'form']) }}
<div class="row">
<div class="col-md-6 col-md-offset-3">
<table class="table">
    <thead>
        <tr>
            <th class="text-center">{{ Form::label('month-start','Počátek')  }}</th>
            <th class="text-center">{{ Form::label('month-start','Konec')  }}</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{ Form::input('month', 'month-start', (isset($choice_month_start) ? $choice_month_start : $min_insert_month), ['min'=> $min_insert_month,'max'=> $max_insert_month,'class'=> 'form-control']); }}</td>
            <td>{{ Form::input('month', 'month-end', (isset($choice_month_end) ? $choice_month_end : $max_insert_month), ['min'=> $min_insert_month,'max'=> $max_insert_month,'class'=> 'form-control']); }}</td>
            <td>{{ Form::submit('Provést',['name' => 'submit_month_record','class' => 'btn btn-primary']) }}</td>
        </tr>
    </tbody>
</table>
</div>
</div>
{{ Form::close() }}
<div id="chart_div" style="width: 1200px; height: 600px;"></div>
@stop


<!-- /*

            <script type="text/javascript">

            </script>




<table>
                    <thead>
                        <tr>
                            <th>Měsíc</th>
                            <th>Počet<br />objednávek<br />celkem</th>
                            <th>Počet<br />objednávek<br />úspěšných</th>
                            <th>Průmerna<br />cena<br />nakupu</th>
                            <th>Cena<br />+TRA</th>
                            <th>Cena</th>
                            <th>TRA</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr class="right">
                            <th>SUMA</th>
                            <td>< $sum->sum_month_count_buy_all; ?></td>
                            <td>< $sum->sum_month_count_buy_success; ?></td>
                            <td>A/N</td>
                            <td>< $sum->sum_month_price_all; ?></td>
                            <td>< $sum->sum_month_price_only; ?></td>
                            <td>< $sum->sum_month_price_transport; ?></td>
                        </tr>
                        <tr class="right">
                            <th>PRŮMER</th>
                            <td>< round(($sum->sum_month_count_buy_all / $sum->sum_count_row), 0); ?></td>
                            <td>< round(($sum->sum_month_count_buy_success / $sum->sum_count_row), 0); ?></td>
                            <td>< round(($sum->sum_month_price_all / $sum->sum_month_count_buy_success), -1); ?></td>
                            <td>< round(($sum->sum_month_price_all / $sum->sum_count_row), 0); ?></td>
                            <td>< round(($sum->sum_month_price_only / $sum->sum_count_row), 0); ?></td>
                            <td>< round(($sum->sum_month_price_transport / $sum->sum_count_row), 0); ?></td>
                        </tr>
                    </tfoot>
                    <tbody>

                            <tr class="right">
                                <td> substr($v->lm_month, 0, 7) </td>
                                <td> $v->lm_count_buy_all </td>
                                <td> $v->lm_count_buy_success </td>
                                <td> round($v->result_price_prumer, -1) </td>
                                <td> $v->lm_price_all </td>
                                <td> $v->result_price_only </td>
                                <td> $v->lm_price_transport </td>
                            </tr>
                    </tbody>
                </table>



 */ -->
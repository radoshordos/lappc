@extends('adm.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Statistiky produktů
@stop

{{-- Content --}}
@section('content')
            <form action="" method="post">
                <table>
                    <tbody>
                        <tr>
                            <td><input type="month" name="month-start" min="<?= $min_insert_month ?>" max="<?= $max_insert_month ?>" value="<?= (!empty($_POST["month-start"]) ? $_POST["month-start"] : $min_insert_month); ?>" /></td>
                            <td><input type="month" name="month-end"  min="<?= $min_insert_month ?>"  max="<?= $max_insert_month ?>" value="<?= (!empty($_POST["month-end"]) ? $_POST["month-end"] : $max_insert_month); ?>" /></td>
                            <td><?= $this->formSubmit("submit-month-record", "Provést"); ?></td>
                        </tr>
                    </tbody>
                </table>
            </form>

            <script type="text/javascript">
                google.load("visualization", "1", {packages:["corechart"]});
                google.setOnLoadCallback(drawChart);
                function drawChart() {
                    var data = new google.visualization.DataTable();
                    data.addColumn('string', 'M\u011bsíc');
                    data.addColumn('number', 'Cena celkem s dopravou');
                    data.addColumn('number', 'Cena celkem');
                    data.addColumn('number', 'Doprava');
                    data.addRows(<?= count($row) ?>);
<?php foreach ($row as $val) { ?>
            data.setValue(<?= $inc ?>, 0, '<?= substr($val->lm_month, 0, 7) ?>');
            data.setValue(<?= $inc ?>, 1, <?= $val->lm_price_all ?>);
            data.setValue(<?= $inc ?>, 2, <?= $val->result_price_only ?>);
            data.setValue(<?= $inc++ ?>, 3, <?= $val->lm_price_transport ?>);
<?php } ?>
        var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
        chart.draw(data, {width: 1024, height: 480, title: 'Prodeje obchodu'});
    }
            </script>
            <div id="chart_div"></div>



@stop


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
                            <td><?= $sum->sum_month_count_buy_all; ?></td>
                            <td><?= $sum->sum_month_count_buy_success; ?></td>
                            <td>A/N</td>
                            <td><?= $sum->sum_month_price_all; ?></td>
                            <td><?= $sum->sum_month_price_only; ?></td>
                            <td><?= $sum->sum_month_price_transport; ?></td>
                        </tr>
                        <tr class="right">
                            <th>PRŮMER</th>
                            <td><?= round(($sum->sum_month_count_buy_all / $sum->sum_count_row), 0); ?></td>
                            <td><?= round(($sum->sum_month_count_buy_success / $sum->sum_count_row), 0); ?></td>
                            <td><?= round(($sum->sum_month_price_all / $sum->sum_month_count_buy_success), -1); ?></td>
                            <td><?= round(($sum->sum_month_price_all / $sum->sum_count_row), 0); ?></td>
                            <td><?= round(($sum->sum_month_price_only / $sum->sum_count_row), 0); ?></td>
                            <td><?= round(($sum->sum_month_price_transport / $sum->sum_count_row), 0); ?></td>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach ($row as $v) { ?>
                            <tr class="right">
                                <td><?= substr($v->lm_month, 0, 7) ?></td>
                                <td><?= $v->lm_count_buy_all ?></td>
                                <td><?= $v->lm_count_buy_success ?></td>
                                <td><?= round($v->result_price_prumer, -1) ?></td>
                                <td><?= $v->lm_price_all ?></td>
                                <td><?= $v->result_price_only ?></td>
                                <td><?= $v->lm_price_transport ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>


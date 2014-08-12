@extends('adm.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Správa slev
@stop

{{-- Content --}}
@section('content')
@if (count($sale)>0)
<form action="" method="post">
    <table class="table table-hover table-condensed">
        <thead>
            <tr>
                <th>ID</th>
                <th>Viditelné</th>
                <th>Sleva celý text</th>
                <th>Sleva</th>
                <th>Využití<br/>u produktů</th>
                <th>Využití<br/>při akci</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <td colspan="6" class="right">Zobrazeno : <strong>{{ count($sale) }}</strong> řádků</td>
            </tr>
        </tfoot>
        <tbody>
        @foreach ($sale as $row)
            <tr>
                <td>{{ $row->id }}</td>
                <td>
                            <?php
                            /*
                            if (intval($row->sale_count_items) == 0 && intval($row->sale_count_akce) == 0) {
                                echo $this->formSelect("is_visible[$row->is_id]", $row->is_visible, array("onchange" => "submit()"), array("0" => "NE", "1" => "ANO"));
                                                          } else {
                                                              echo $this->formSelect("is_visible[$row->is_id]", $row->is_visible, array("class" => "readonly"), array("1" => "ANO"));
                                                          }
                                                          */
                                                          ?>
                </td>
                <td><?= $row->desc; ?></td>
                <td><?= $row->name; ?></td>
                <td><?= $row->sale_count_items; ?></td>
                <td><?= $row->sale_count_akce; ?></td>
            </tr>
        @endforeach
        </tbody>
    </table>
</form>
@endif
@stop
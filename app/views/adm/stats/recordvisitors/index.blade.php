@extends('adm.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Uživatelé hledají
@stop

{{-- Content --}}
@section('content')

<ul class="nav nav-tabs" role="tablist">
  <li class="active"><a href="#last" role="tab" data-toggle="tab">Poslední hledané výrazy</a></li>
  <li><a href="#favorite" role="tab" data-toggle="tab">Nejčasněji hledané výrazy</a></li>
  <li><a href="#zero" role="tab" data-toggle="tab">Nejčasněji nenalezené výrazy</a></li>
</ul>

<div class="tab-content">
    <div class="tab-pane fade in active" id="last" style="padding-top: 2em">
        <table class="table table-bordered table-striped table-condensed table-hover">
            <thead>
                <tr>
                    <th class="text-center">#ID</th>
                    <th>Datum a čas</th>
                    <th>Hledaný výraz</th>
                    <th>Počet produktů</th>
                    <th>Počet výrobců</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                     <td colspan="5" class="text-right">Zobrazeno : <strong>{{ count($recordvisitors) }}</strong> výsledků</td>
                </tr>
            </tfoot>
            <tbody>
                @foreach ($recordvisitors as $row)
                <tr>
                    <td>{{ $row->id; }}</td>
                    <td>{{ $row->find_at; }}</td>
                    <td>{{ $row->filter_find; }}</td>
                    <td>{{ $row->count_prod; }}</td>
                    <td>{{ $row->count_dev; }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="tab-pane fade in active" id="favorite" style="padding-top: 2em">
    <table>
        <thead>
            <tr class="center">
                <th>PoÄ?et</th>
                <th>HledanĂ˝ vĂ˝raz</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <td colspan="3" class="right">Zobrazeno : <strong><?= count($res) ?></strong> Ĺ?ĂĄdkĹŻ</td>
            </tr>
        </tfoot>
        <tbody>
                @foreach ($recordvisitors as $row)
                    <tr>
                        <td class="center"><?= $row->pocet; ?></td>
                        <td><?= $row->lpf_filter_find; ?></td>
                    </tr>
                @endforeach
        </tbody>
    </table>


    </div>
    <div class="tab-pane fade in active" id="zero" style="padding-top: 2em">


        <table>
            <thead>
                <tr class="center">
                    <th>PoÄ?et</th>
                    <th>HledanĂ˝ vĂ˝raz</th>
                    <th>SUMA</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <td colspan="4" class="right">Zobrazeno : <strong><?= count($res) ?></strong> Ĺ?ĂĄdkĹŻ</td>
                </tr>
            </tfoot>
                @foreach ($recordvisitors as $row)
                    <tbody>
                        <tr>
                            <td class="center"><?= $row->pocet; ?></td>
                            <td><?= $row->lpf_filter_find ?></td>
                            <td class="center"><?= $row->lpf_result_count_prod; ?></td>
                        </tr>
                    </tbody>
                @endforeach
        </table>

        
    </div>
</div>
@stop
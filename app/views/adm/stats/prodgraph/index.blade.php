@extends('adm.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Statistiky produktů
@stop

{{-- Content --}}
@section('content')
<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th colspan="5" class="center warning">Celkový počet produktů: {{ $prod_count_all }}</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th></th>
            @foreach($prod_mode as $row)
                <th>{{ $row->name; $arr[] = $row->name; }}</th>
            @endforeach
        </tr>
        @foreach($tree_group_for_prod as $row)
            <tr>
                <th>{{ $row->name; }}</th>
                <td>{{ \Authority\Eloquent\ViewProd::where('tree_group_id','=',$row->id)->where('prod_mode_id','=',1)->count(); }} </td>
                <td>{{ \Authority\Eloquent\ViewProd::where('tree_group_id','=',$row->id)->where('prod_mode_id','=',2)->count(); }} </td>
                <td>{{ \Authority\Eloquent\ViewProd::where('tree_group_id','=',$row->id)->where('prod_mode_id','=',3)->count(); }} </td>
                <td>{{ \Authority\Eloquent\ViewProd::where('tree_group_id','=',$row->id)->where('prod_mode_id','=',4)->count(); }} </td>
            </tr>
        @endforeach
        <tr class="success">
            <th>Celkem</th>
            <td>{{ $res1 = \Authority\Eloquent\ViewProd::where('prod_mode_id','=',1)->count(); }} </td>
            <td>{{ $res2 = \Authority\Eloquent\ViewProd::where('prod_mode_id','=',2)->count(); }} </td>
            <td>{{ $res3 = \Authority\Eloquent\ViewProd::where('prod_mode_id','=',3)->count(); }} </td>
            <td>{{ $res4 = \Authority\Eloquent\ViewProd::where('prod_mode_id','=',4)->count(); }} </td>
        </tr>
        <tr>
            <th colspan="5" class="text-center">
                <img src="http://chart.apis.google.com/chart?chs=720x380&amp;chd=t:<?= ($res1 / $prod_count_all) * 100 ?>,<?= ($res2 / $prod_count_all) * 100 ?>,<?= ($res3 / $prod_count_all) * 100 ?>,<?= ($res4 / $prod_count_all) * 100 ?>&amp;cht=p3&amp;chl=<?= implode("|", $arr); ?>" alt="Celkový počet produktů" />
            </th>
        </tr>
    </tbody>
</table>
@stop
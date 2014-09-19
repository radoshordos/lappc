@extends('adm.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Přehled produktů
@stop

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
<blockquote>
    <form>
        <div class="row">
            <div class="col-xs-7">
                {{ Form::select('select_tree', ['' => 'Skupina'] + $select_tree, $input_tree, array('id'=> 'select_tree', 'class'=> 'form-control', 'onchange' => 'this.form.submit()')) }}
            </div>
            <div class="col-xs-3">
                {{ Form::select('select_dev', ['' => 'Výrobce'] + $select_dev, $input_dev, array('id'=> 'select_dev', 'class'=> 'form-control', 'onchange' => 'this.form.submit()')) }}
            </div>
            <div class="col-xs-2">
                {{ Form::select('select_limit', ['5' => ' Limit 5','30' => ' Limit 30','90' => 'Limit 90'], $input_limit, array('id'=> 'select_limit', 'class'=> 'form-control', 'onchange' => 'this.form.submit()')) }}
            </div>
        </div>
        <div class="row" style="margin-top: .5em">
            <div class="col-xs-12">
                {{ Form::select('select_sort', ['1' => 'Seřadit dle data poslední změny', '2' => 'Seřadit dle názvu', '3' => 'Seřadit dle ceny'], $input_sort, array('id'=> 'select_sort', 'class'=> 'form-control', 'onchange' => 'this.form.submit()')) }}
            </div>
        </div>
    </form>
</blockquote>

@if ($view->count())
<div class="row">
    <div class="col-md-12">
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th>#ID</th>
                <th>Výrobce</th>
                <th>#TREE</th>
                <th>Záruka</th>
                <th>Nazev</th>
                <th>Cena</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($view as $row)
            <tr>
                <td>{{ $row->prod_id }}</td>
                <td>{{ $row->dev_name }}</td>
                <td>{{ $row->tree_id }}</td>
                <td>{{ $row->prod_warranty_name }}</td>
                <td>{{ link_to_route('adm.product.prod.edit',$row->prod_name,array($row->prod_id,"tree_id=".$row->tree_id)) }}</td>
                <td>{{ $row->prod_price }}</td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>

<div class="text-center">
    <?php echo $view->appends(array(
        'select_tree' => $input_tree,
        'select_dev' => $input_dev,
        'select_limit' => $input_limit,
    ))->links();
    ?>
</div>
@endif
@stop
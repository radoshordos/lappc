@extends('adm.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Synchronizační databáze
@stop

{{-- JavaScript on page --}}
@section ('script')
<script>
    $(document).ready(function () {
        $('#select_all').change(function(){
            var checkboxes = $(this).closest('form').find(':checkbox');
            if($(this).prop('checked')) {
              checkboxes.prop('checked', true);
            } else {
              checkboxes.prop('checked', false);
            }
        });
        $("#select_mixture_dev").select2({});
        $("#select_connect").select2({});
        $("#join").select2({});
    });
</script>
@stop

{{-- Content --}}
@section('content')
<blockquote>
    <form>
        <div class="row">
            <div class="col-xs-3">
                {{ Form::select('select_connect', ['' => 'Propojit podle', 'code_prod' => 'Kódu produktu', 'code_ean' => 'EAN produktu', 'name' => 'Názvu produktu'], (isset($input['select_connect']) ? $input['select_connect'] : NULL), ['id'=> 'select_connect', 'class'=> 'form-control', 'onchange' => 'this.form.submit()']) }}
            </div>
            <div class="col-xs-4">
                {{ Form::select('select_mixture_dev', $select_mixture_dev, (isset($input['select_mixture_dev']) ? $input['select_mixture_dev'] : NULL), ['id'=> 'select_mixture_dev', 'class'=> 'form-control', 'onchange' => 'this.form.submit()']) }}
            </div>
            <div class="col-xs-3">
                {{ Form::select('join', ['left' => 'Spárované','inner' => 'Všechny'], (isset($input['join']) ? $input['join'] : NULL), ['id'=> 'join', 'class'=> 'form-control', 'onchange' => 'this.form.submit()']) }}
            </div>
            <div class="col-xs-2">
                {{ Form::select('limit', ['20' => 'Limit 20','80' => 'Limit 80','500' => 'Limit 500'], (isset($input['limit']) ? $input['limit'] : NULL), ['id'=> 'limit', 'class'=> 'form-control', 'onchange' => 'this.form.submit()']) }}
            </div>
        </div>
        <div class="row" style="margin-top: .4em">
            <div class="col-xs-12">
                {{ Form::select('categorytext', $select_categorytext, (isset($input['categorytext']) ? $input['categorytext'] : NULL), ['id'=> 'categorytext', 'class'=> 'form-control', 'onchange' => 'this.form.submit()']) }}
            </div>
        </div>
    </form>
</blockquote>

@if (isset($db))
<form action="">
<table class="table table-condensed">
    <thead>
        <tr>
            <th>{{ Form::checkbox('select_all', NULL ,NULL, ['id'=>'select_all']) }}</th>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    </thead>
    <tbody>
    @foreach ($db as $row)
    <tr class="bg-success">
        <td>{{ Form::checkbox("select[".$row->sync_id."]",NULL) }}</td>
        <td>{{ $row->sync_code_prod }}</td>
        <td>{{ $row->sync_code_ean }}</td>
        <td>{{ $row->sync_name }}</td>
        <td>{{ $row->sync_desc }}</td>
        <td>{{ $row->sync_price_standard }}</td>
    </tr>
    @if ($row->prod_name)
    <tr class="bg-info">
        <td></td>
        <td>{{ $row->items_code_prod }}</td>
        <td>{{ $row->items_code_ean }}</td>
        <td><a href="{{ URL::route('adm.product.prod.edit',[$row->prod_tree_id, $row->prod_id]); }}">{{ $row->prod_name }}</a></td>
        <td></td>
        <td>{{ $row->prod_price }}</td>
    </tr>
    @endif
    @endforeach
    </tbody>
    <tfoot>
        <tr>
            <td colspan="6" class="text-right">Celkem <b>{{ $db->getTotal() }}</b> záznamů</td>
        </tr>
    </tfoot>
</table>
</form>
<div class="text-center">
    <?php echo $db->appends(
        array('select_connect' => (isset($input['select_connect']) ? $input['select_connect'] : NULL),
              'select_mixture_dev' => (isset($input['select_mixture_dev']) ? $input['select_mixture_dev'] : NULL),
              'join' => (isset($input['join']) ? $input['join'] : NULL),
              'limit' => (isset($input['limit']) ? $input['limit'] : NULL),
        ))->links();
    ?>
</div>
@endif
@stop
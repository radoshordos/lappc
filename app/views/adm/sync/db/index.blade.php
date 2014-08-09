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
                {{ Form::select('select_connect', ['' => 'Propojit podle', 'code_prod' => 'Kódu produktu', 'code_ean' => 'EAN produktu', 'name' => 'Názvu produktu'], (isset($input['select_connect']) ? $input['select_connect'] : NULL), array('id'=> 'select_connect', 'class'=> 'form-control', 'onchange' => 'this.form.submit()')) }}
            </div>
            <div class="col-xs-4">
                {{ Form::select('select_mixture_dev', ['' => 'Seskupení výrobce'] + $select_mixture_dev, (isset($input['select_mixture_dev']) ? $input['select_mixture_dev'] : NULL), array('id'=> 'select_mixture_dev', 'class'=> 'form-control', 'onchange' => 'this.form.submit()')) }}
            </div>
            <div class="col-xs-3">
                {{ Form::select('join', ['left' => 'Spárované','inner' => 'Všechny'], (isset($input['join']) ? $input['join'] : NULL), array('id'=> 'join', 'class'=> 'form-control', 'onchange' => 'this.form.submit()')) }}
            </div>
            <div class="col-xs-2">
                {{ Form::select('limit', ['20' => 'Limit 20','80' => 'Limit 80','500' => 'Limit 500'], (isset($input['limit']) ? $input['limit'] : NULL), array('id'=> 'limit', 'class'=> 'form-control', 'onchange' => 'this.form.submit()')) }}
            </div>
        </div>
    </form>
</blockquote>

@if (isset($db))
<form action="">
<table class="table table-condensed">
    <thead>
        <tr style="background-color:#BDBDBD">
            <td><input type="checkbox" id="select_all" name="select_all" /></td>
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
        <td class="bg-warning" class="checkbox"><input type="checkbox" name="select[]" /></td>
        <td>{{ $row->sync_code_prod }}</td>
        <td>{{ $row->sync_code_ean }}</td>
        <td>{{ $row->sync_name }}</td>
        <td>{{ $row->sync_desc }}</td>
        <td>{{ $row->sync_price_standart }}</td>
    </tr>
    @if ($row->prod_name)
    <tr class="bg-info">
        <td class="bg-warning"></td>
        <td></td>
        <td></td>
        <td>{{ $row->prod_name }}</td>
        <td></td>
        <td></td>
    </tr>
    @endif
    @endforeach
    </tbody>
    <tfoot>
        <tr style="background-color:#BDBDBD">
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
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
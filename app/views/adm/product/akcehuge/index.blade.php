@extends('adm.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Hromadné akce
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
        $("#select_action_record").select2({});
    });
</script>
@stop

{{-- Content --}}
@section('content')
{{ Form::open(['route' => ['adm.product.akcehuge.index']]) }}
<div class="input-group form-group">
    <span class="input-group-addon">Import</span>
    {{ Form::select('select_action_record',$select_action_record, $action_record, ['id' => 'select_action_record', 'class'=> 'form-control', 'onchange' => 'this.form.submit()']) }}
</div>

<table class="table table-striped table-condensed">
    <thead>
        <tr>
            <th>{{ Form::checkbox('select_all', NULL ,NULL, ['id'=>'select_all']) }}</th>
            <th>Kód</th>
            <th>Název</th>
            <th>Cena</th>
        </tr>
    </thead>
    <tbody>
        @foreach($item_action as $row)
        <tr>
            <td>{{ Form::checkbox("select[".$row->sync_db_id."]",NULL) }}</td>
            <td>{{ $row->sync_db_code_prod }}</td>
            <td>{{ $row->prod_name }}</td>
            <td>{{ $row->prod_price }} / {{ (($row->sync_db_price_internet != NULL) ? $row->sync_db_price_internet : $row->sync_db_price_action) }}</td>
        </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <td class="text-right" colspan="5">Zobrazeno <b>{{ count($item_action) }}</b> záznamů</td>
        </tr>
    </tfoot>
</table>
{{ Form::close() }}
@stop
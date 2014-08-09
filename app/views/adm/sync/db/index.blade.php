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
            <div class="col-xs-4">
                {{ Form::select('select_connect', ['' => 'Propojit podle', 'code_prod' => 'Kódu produktu', 'code_ean' => 'EAN produktu', 'name' => 'Názvu produktu'], (isset($input['select_connect']) ? $input['select_connect'] : NULL), array('id'=> 'select_connect', 'class'=> 'form-control', 'onchange' => 'this.form.submit()')) }}
            </div>
            <div class="col-xs-4">
                {{ Form::select('select_mixture_dev', ['' => 'Seskupení výrobce'] + $select_mixture_dev, (isset($input['select_mixture_dev']) ? $input['select_mixture_dev'] : NULL), array('id'=> 'select_mixture_dev', 'class'=> 'form-control', 'onchange' => 'this.form.submit()')) }}
            </div>
            <div class="col-xs-4">
                {{ Form::select('join', ['left' => 'Spárované','inner' => 'Všechny'], (isset($input['join']) ? $input['join'] : NULL), array('id'=> 'join', 'class'=> 'form-control', 'onchange' => 'this.form.submit()')) }}
            </div>
        </div>
    </form>
</blockquote>

@if (isset($db))
<table class="table">
    @foreach ($db as $row)
    <tr class="bg-success">
        <td>{{ $row->sync_id }}</td>
        <td>{{ $row->sync_code_prod }}</td>
        <td>{{ $row->sync_code_ean }}</td>
        <td>{{ $row->sync_name }}</td>
        <td>{{ $row->sync_desc }}</td>
        <td>{{ $row->sync_price_standart }}</td>
    </tr>
    @if ($row->prod_name)
    <tr class="bg-info">
        <td></td>
        <td></td>
        <td></td>
        <td>{{ $row->prod_name }}</td>
        <td></td>
        <td></td>
    </tr>
    @endif
    @endforeach
</table>
@endif
@stop
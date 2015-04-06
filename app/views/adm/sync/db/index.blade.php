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
        $("#select_mixture_dev").select2({
            placeholder: "Seskupení výrobců",
            allowClear: true
        });
        $("#select_connect").select2({
            placeholder: "Propojit podle",
            allowClear: true
        });
        $("#select_join").select2({});
        $("#select_limit").select2({});
        $("#select_basic").select2({});
        $("#select_prodmode").select2({
            placeholder: "Zboží",
            allowClear: true
        });
		$("#select_availability_count").select2({
			placeholder: "Dodavatel má",
			allowClear: true
		});
        $("#select_accessory").select2({
            placeholder: "Má příslušenství",
            allowClear: true
        });
        $("#select_media").select2({
            placeholder: "Má média",
            allowClear: true
        });
        $("#select_img").select2({
            placeholder: "Má obrázek",
            allowClear: true
        });
        $("#select_categorytext").select2({
            placeholder: "Kategorie produktů",
            allowClear: true
        });
        $("#select_money").select2({
            placeholder: "Cena Sync",
            allowClear: true
        });
    });
</script>
@stop

{{-- Content --}}
@section('content')

<blockquote>
	{{ Form::open(['route' => ['adm.sync.db.index'],'method' => 'GET','class' => 'form-horizontal', 'role' => 'form']) }}
        <div class="row">
            <div class="col-xs-2">
                {{ Form::select('select_basic', $select_basic, $choice_basic, ['id'=> 'select_basic', 'class'=> 'form-control', 'onchange' => 'this.form.submit()']) }}
            </div>
            <div class="col-xs-2">
                {{ Form::select('select_connect', $select_connect, $choice_connect, ['id'=> 'select_connect', 'class'=> 'form-control', 'onchange' => 'this.form.submit()']) }}
            </div>
            <div class="col-xs-4">
                {{ Form::select('select_mixture_dev', $select_mixture_dev, $choice_mixture_dev, ['id'=> 'select_mixture_dev', 'class'=> 'form-control', 'onchange' => 'this.form.submit()']) }}
            </div>
            <div class="col-xs-2">
                {{ Form::select('select_join', $select_join , $choice_join, ['id'=> 'select_join', 'class'=> 'form-control', 'onchange' => 'this.form.submit()']) }}
            </div>
            <div class="col-xs-2">
                {{ Form::select('select_limit', $select_limit, $choice_limit, ['id'=> 'select_limit', 'class'=> 'form-control', 'onchange' => 'this.form.submit()']) }}
            </div>
        </div>
        <div class="row" style="margin-top: .4em">
            <div class="col-xs-8">
                {{ Form::select('select_categorytext', $select_categorytext, $choice_categorytext, ['id'=> 'select_categorytext', 'class'=> 'form-control', 'onchange' => 'this.form.submit()']) }}
            </div>
            <div class="col-xs-2">
                {{ Form::select('select_prodmode', $select_prodmode, $choice_prodmode, ['id'=> 'select_prodmode', 'class'=> 'form-control', 'onchange' => 'this.form.submit()']) }}
            </div>
            <div class="col-xs-2">
                {{ Form::select('select_money', $select_money, $choice_money, ['id'=> 'select_money', 'class'=> 'form-control', 'onchange' => 'this.form.submit()']) }}
            </div>
        </div>
        <div class="row" style="margin-top: .4em">
			<div class="col-xs-2">
				{{ Form::select('select_availability_count', $select_availability_count, $choice_availability_count, ['id'=> 'select_availability_count', 'class'=> 'form-control', 'onchange' => 'this.form.submit()']) }}
			</div>
            <div class="col-xs-3">
                {{ Form::select('select_accessory', $select_accessory, $choice_accessory, ['id'=> 'select_accessory', 'class'=> 'form-control', 'onchange' => 'this.form.submit()']) }}
            </div>
            <div class="col-xs-3">
                {{ Form::select('select_media', $select_media, $choice_media, ['id'=> 'select_media', 'class'=> 'form-control', 'onchange' => 'this.form.submit()']) }}
            </div>
            <div class="col-xs-2">
                {{ Form::select('select_img', $select_img , $choice_img, ['id'=> 'select_img', 'class'=> 'form-control', 'onchange' => 'this.form.submit()']) }}
            </div>
            <div class="col-xs-2">
                {{ Form::text('record', $record, ['maxlength' => '40', 'class'=> 'form-control', 'placeholder'=> 'Record #ID']) }}
            </div>
        </div>
	{{ Form::close() }}
</blockquote>

@if (isset($db))
{{ Form::open(['route' => ['adm.sync.db.store'],'class' => 'form-horizontal', 'role' => 'form']) }}
{{ Form::hidden('select_basic', $choice_basic); }}
{{ Form::hidden('select_connect', $choice_connect) }}
{{ Form::hidden('select_mixture_dev', $choice_mixture_dev) }}
{{ Form::hidden('select_join', $choice_join) }}
{{ Form::hidden('select_limit', $choice_limit) }}
{{ Form::hidden('select_categorytext', $choice_categorytext) }}
{{ Form::hidden('select_prodmode', $choice_prodmode) }}
{{ Form::hidden('select_money', $choice_money) }}
{{ Form::hidden('select_availability_count', $choice_availability_count) }}
{{ Form::hidden('select_accessory', $choice_accessory) }}
{{ Form::hidden('select_media', $choice_media) }}
{{ Form::hidden('select_img', $choice_img) }}
{{ Form::hidden('record', $record) }}



<table class="table table-condensed table-bordered">
    <thead>
        <tr>
            <th>{{ Form::checkbox('select_all', NULL ,NULL, ['id' => 'select_all']) }}</th>
            <th>Kód</th>
			<th><button type="button" class="btn btn-default btn-xs" title="Produktový mód">M</button></th>
            <th>EAN</th>
            <th>Název</th>
            <th>Popis</th>
            <th class="text-right">Cena</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($db as $row)
        <tr class="bg-success" style="border-top:2px solid #666">
            <td></td>
            <td>{{ $row->sync_code_prod }}</td>
			<td></td>
            <td>{{ $row->sync_code_ean }}</td>
            <td>
                @if ($row->prod_name)
                    {{ $row->sync_name }}
                @else
                    <a href="{{ URL::route('adm.product.prod.create',['sync_id' => $row->sync_id]); }}">{{ $row->sync_name }}</a>
                @endif
            </td>
            <td><small>{{ substr($row->sync_desc, 0, 66); }}</small></td>
			@if ($row->sync_price_standard < $row->prod_price)
				<td class="text-right bg-warning">{{ $row->sync_price_standard }}</td>
			@elseif($row->sync_price_standard > $row->prod_price)
				<td class="text-right bg-danger">{{ $row->sync_price_standard }}</td>
			@else
				<td class="text-right">{{ $row->sync_price_standard }}</td>
			@endif
        </tr>
        @if ($row->prod_name)
        <tr class="bg-info">
            <td>{{ Form::checkbox("select[".$row->items_id."]",NULL).Form::hidden("sync_price_standard[".$row->items_id."]",$row->sync_price_standard); }}</td>
            <td>{{ $row->items_code_prod }}</td>
			<td><button type="button" class="btn btn-default btn-xs" title="Produktový mód">{{ $row->prod_mode_id }}</button></td>
            <td>{{ $row->items_code_ean }}</td>
            <td><a href="{{ URL::route('adm.product.prod.edit',[$row->prod_tree_id, $row->prod_id]); }}">{{ $row->prod_name }}</a></td>
            <td><small>{{ substr($row->prod_desc, 0, 66); }}</small></td>
            <td class="{{ ($row->sync_price_standard < $row->prod_price ? 'text-right bg-danger' : "text-right") }}">{{ $row->prod_price }}</td>
        </tr>
        @endif
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <td colspan="7" class="text-right">Celkem <b>{{ $db->getTotal() }}</b> záznamů</td>
        </tr>
		<tr>
			<td colspan="5">
				{{ Form::select('sync_action',['','fix_price' => 'Opravit cenu','fix_go_hidden' => 'Skrýt produkt'],  NULL, ['id'=> 'mixture_dev', 'class'=> 'form-control']) }}
			</td>
			<td colspan="2">
				{{ Form::submit('OK',['class'=> 'form-control']); }}
			</td>
		</tr>
    </tfoot>
</table>
{{ Form::close() }}
<div class="text-center">
	{{
		$db->appends([
			'select_basic' => $choice_basic,
			'select_connect' => $choice_connect,
			'select_mixture_dev' => $choice_mixture_dev,
			'select_join' => $choice_join,
			'select_limit' => $choice_limit,
			'select_categorytext' => $choice_categorytext,			
			'select_prodmode' => $choice_prodmode,			
			'select_money' => $choice_money,				
			'select_availability_count' => $choice_availability_count,			
			'select_accessory' => $choice_accessory,			
			'select_media' => $choice_media,
			'select_img' => $choice_img,			
			'record' => $record
		])->links();
	}}
</div>
@endif
@stop
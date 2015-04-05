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
        $("#mixture_dev").select2({
            placeholder: "Seskupení výrobců",
            allowClear: true
        });
        $("#connect").select2({
            placeholder: "Propojit podle",
            allowClear: true
        });
        $("#join").select2({});
        $("#limit").select2({});
        $("#basic").select2({});
        $("#prodmode").select2({
            placeholder: "Zboží",
            allowClear: true
        });
		$("#availability_count").select2({
			placeholder: "Dodavatel má",
			allowClear: true
		});
        $("#accessory").select2({
            placeholder: "Má příslušenství",
            allowClear: true
        });
        $("#media").select2({
            placeholder: "Má přílohu",
            allowClear: true
        });
        $("#img").select2({
            placeholder: "Má obrázek",
            allowClear: true
        });
        $("#categorytext").select2({
            placeholder: "Kategorie produktů",
            allowClear: true
        });
        $("#money").select2({
            placeholder: "Cena Sync",
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
            <div class="col-xs-2">
                {{ Form::select('basic', ['syncdb' => 'SyncDb', 'items' => 'ItemDb'], (isset($input['basic']) ? $input['basic'] : NULL), ['id'=> 'basic', 'class'=> 'form-control', 'onchange' => 'this.form.submit()']) }}
            </div>
            <div class="col-xs-2">
                {{ Form::select('connect', ['' => '', 'code_prod' => 'Kódu produktu', 'code_ean' => 'EAN produktu', 'name' => 'Názvu produktu','connect' => 'Existujícího spojení'], (isset($input['connect']) ? $input['connect'] : NULL), ['id'=> 'connect', 'class'=> 'form-control', 'onchange' => 'this.form.submit()']) }}
            </div>
            <div class="col-xs-4">
                {{ Form::select('mixture_dev', $mixture_dev, (isset($input['mixture_dev']) ? $input['mixture_dev'] : NULL), ['id'=> 'mixture_dev', 'class'=> 'form-control', 'onchange' => 'this.form.submit()']) }}
            </div>
            <div class="col-xs-2">
                {{ Form::select('join', ['left' => 'Spárované','noleft' => 'Nespárované','inner' => 'Všechny'], (isset($input['join']) ? $input['join'] : NULL), ['id'=> 'join', 'class'=> 'form-control', 'onchange' => 'this.form.submit()']) }}
            </div>
            <div class="col-xs-2">
                {{ Form::select('limit', ['20' => 'Limit 20','80' => 'Limit 80','500' => 'Limit 500'], (isset($input['limit']) ? $input['limit'] : NULL), ['id'=> 'limit', 'class'=> 'form-control', 'onchange' => 'this.form.submit()']) }}
            </div>
        </div>
        <div class="row" style="margin-top: .4em">
            <div class="col-xs-8">
                {{ Form::select('categorytext', $categorytext, (isset($input['categorytext']) ? $input['categorytext'] : NULL), ['id'=> 'categorytext', 'class'=> 'form-control', 'onchange' => 'this.form.submit()']) }}
            </div>
            <div class="col-xs-2">
                {{ Form::select('prodmode', ["" => "",'1' => 'Není v Sync' ,"2" => "Neskryté zboží", "3" => "Jen skryté zboží"], (isset($input['prodmode']) ? $input['prodmode'] : NULL), ['id'=> 'prodmode', 'class'=> 'form-control', 'onchange' => 'this.form.submit()']) }}
            </div>
            <div class="col-xs-2">
                {{ Form::select('money', ['' => '','diverse' => 'Rozdílná','same' => 'Stejná'], (isset($input['money']) ? $input['money'] : NULL), ['id'=> 'money', 'class'=> 'form-control', 'onchange' => 'this.form.submit()']) }}
            </div>
        </div>
        <div class="row" style="margin-top: .4em">
			<div class="col-xs-2">
				{{ Form::select('availability_count', ['' => '','1' => 'ANO','2' => 'NE', '3' => 'Neznámo'], (isset($input['availability_count']) ? $input['availability_count'] : NULL), ['id'=> 'availability_count', 'class'=> 'form-control', 'onchange' => 'this.form.submit()']) }}
			</div>
            <div class="col-xs-3">
                {{ Form::select('accessory', ['' => '','1' => 'ANO','2' => 'NE'], (isset($input['accessory']) ? $input['accessory'] : NULL), ['id'=> 'accessory', 'class'=> 'form-control', 'onchange' => 'this.form.submit()']) }}
            </div>
            <div class="col-xs-3">
                {{ Form::select('media', ['' => '','1' => 'ANO','2' => 'NE'], (isset($input['media']) ? $input['media'] : NULL), ['id'=> 'media', 'class'=> 'form-control', 'onchange' => 'this.form.submit()']) }}
            </div>
            <div class="col-xs-2">
                {{ Form::select('img', ['' => '','1' => 'ANO','2' => 'NE'], (isset($input['img']) ? $input['img'] : NULL), ['id'=> 'img', 'class'=> 'form-control', 'onchange' => 'this.form.submit()']) }}
            </div>
            <div class="col-xs-2">
                {{ Form::text('record', (isset($input['record']) ? $input['record'] : NULL), ['maxlength' => '40', 'class'=> 'form-control', 'placeholder'=> 'Record #ID']) }}
            </div>
        </div>
    </form>
</blockquote>

@if (isset($db))
<form action="">
<table class="table table-condensed">
    <thead>
        <tr>
            <th>{{ Form::checkbox('select_all', NULL ,NULL, ['id' => 'select_all']) }}</th>
            <th>Kód</th>
            <th>EAN</th>
            <th>Název</th>
            <th>Popis</th>
            <th class="text-right">Cena</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($db as $row)
        <tr class="bg-success">
            <td>{{ Form::checkbox("select[".$row->sync_id."]",NULL) }}</td>
            <td>{{ $row->sync_code_prod }}</td>
            <td>{{ $row->sync_code_ean }}</td>
            <td>
                @if ($row->prod_name)
                    {{ $row->sync_name }}
                @else
                    <a href="{{ URL::route('adm.product.prod.create',['sync_id' => $row->sync_id]); }}">{{ $row->sync_name }}</a>
                @endif
            </td>
            <td>{{ substr($row->sync_desc, 0, 100); }}</td>
            <td class="{{ ($row->sync_price_standard > $row->prod_price ? 'text-right bg-danger' : "text-right") }}">{{ $row->sync_price_standard }}</td>
        </tr>
        @if ($row->prod_name)
        <tr class="bg-info">
            <td></td>
            <td>{{ $row->items_code_prod }}</td>
            <td>{{ $row->items_code_ean }}</td>
            <td><a href="{{ URL::route('adm.product.prod.edit',[$row->prod_tree_id, $row->prod_id]); }}">{{ $row->prod_name }}</a></td>
            <td>{{ substr($row->prod_desc, 0, 100); }}</td>
            <td class="{{ ($row->sync_price_standard < $row->prod_price ? 'text-right bg-danger' : "text-right") }}">{{ $row->prod_price }}</td>
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
    {{ $db->appends([
              'basic'  => (isset($input['basic']) ? $input['basic'] : NULL),
              'connect' => (isset($input['connect']) ? $input['connect'] : NULL),
              'mixture_dev' => (isset($input['mixture_dev']) ? $input['mixture_dev'] : NULL),
              'join' => (isset($input['join']) ? $input['join'] : NULL),
              'availability_count' => (isset($input['availability_count']) ? $input['availability_count'] : NULL),
              'prodmode' => (isset($input['prodmode']) ? $input['prodmode'] : NULL),
              'limit' => (isset($input['limit']) ? $input['limit'] : NULL),
              'record' => (isset($input['record']) ? $input['record'] : NULL),
        ])->links();
    }}
</div>
@endif
@stop
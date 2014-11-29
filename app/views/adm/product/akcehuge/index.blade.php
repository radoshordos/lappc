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
        $("#select_action_record").select2({
                allowClear: true
        });
        $("#select_template").select2({
                allowClear: true
        });
        $("#select_sale").select2({});
    });
</script>
@stop

{{-- Content --}}
@section('content')
{{ Form::open(['route' => ['adm.product.akcehuge.index', 'dfilter' => $dfilter],'method' => 'GET','class' => 'form-horizontal', 'role' => 'form']) }}
<p class="row">
    <div class="col-xs-12 text-center"  style="margin-bottom: 1.2em">
         <nav>
           <ul class="pager">
             <li class="previous"><a href="{{ URL::route('adm.product.akceavailability.index') }}">Správa platnosti akce</a></li>
             <li>        <div class="btn-group" data-toggle="buttons">
                             <label class="btn btn-primary {{ ($dfilter == 'mode1' || $dfilter == "" ? 'active' : NULL) }}">
                                 {{ Form::radio('dfilter', 'mode1',($dfilter == 'mode1' ? 'true' : NULL), ['onchange' => 'this.form.submit()']); }}Zobrazit vše
                             </label>
                             <label class="btn btn-success {{ ($dfilter == 'mode2' ? 'active' : NULL) }}">
                                  {{ Form::radio('dfilter', 'mode2',($dfilter == 'mode2' ? 'true' : NULL), ['onchange' => 'this.form.submit()']); }}Nespárované položky
                             </label>
                             <label class="btn btn-success {{ ($dfilter == 'mode3' ? 'active' : NULL) }}">
                                  {{ Form::radio('dfilter', 'mode3',($dfilter == 'mode3' ? 'true' : NULL), ['onchange' => 'this.form.submit()']); }}Připravené k akci
                             </label>
                             <label class="btn btn-success {{ ($dfilter == 'mode4' ? 'active' : NULL) }}">
                                  {{ Form::radio('dfilter', 'mode4',($dfilter == 'mode4' ? 'true' : NULL), ['onchange' => 'this.form.submit()']); }}Již v akci
                             </label>
                         </div></li>
             <li class="next"><a href="{{ URL::route('adm.product.akcetemplate.index') }}">Šablony akcí</a></li>
           </ul>
         </nav>
    </div>
    <div class="col-lg-12">
        <div class="input-group form-group">
            <span class="input-group-addon">Import</span>
            {{ Form::select('select_action_record',$select_action_record, $action_record, ['id' => 'select_action_record', 'class'=> 'form-control', 'onchange' => 'this.form.submit()']) }}
        </div>
    </div>
</p>
{{ Form::close() }}

@if (intval($choice_action_record)>0)
{{ Form::open(['route' => ['adm.product.akcehuge.index', 'dfilter' => $dfilter, 'select_action_record' => $choice_action_record],'method' => 'POST','class' => 'form-horizontal', 'role' => 'form']) }}
@if ($dfilter == 'mode3')
<table class="table table-striped table-bordered table-hover">
    <tbody>
        <tr>
            <th class="col-lg-2">Šablona</th>
            <td class="col-lg-10">{{ Form::select('select_template',$select_template, $choice_template, ['id' => 'select_template', 'required' => 'required', 'class'=> 'form-control']) }}</td>
        </tr>
        <tr>
            <th class="col-lg-2">Sleva</th>
            <td class="col-lg-10">{{ Form::select('select_sale',$select_sale, $choice_sale, ['id' => 'select_sale', 'class'=> 'form-control']) }}</td>
        </tr>
    </tbody>
</table>
@endif

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
            @if (isset($row->prod_id))
            <td>{{ Form::checkbox("select[".$row->sync_db_id."]",NULL) }}</td>
            @else
            <td></td>
            @endif
            <td>{{ $row->sync_db_code_prod }}</td>
            @if ($row->prod_mode_id >=3)
                <td class="col-xs-4">
                    {{ link_to_route('adm.product.prod.edit', $row->prod_name." [".$row->prod_ic_all."]",[$row->prod_tree_id,$row->prod_id]) }}
                </td>
            @else
                <td class="col-xs-4"></td>
            @endif

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

<p class="text-center">
@if ($dfilter == 'mode3')
    {{ Form::submit('Nastavit hromadnou akci',['name' => 'add-huge-action','class' => 'btn btn-success']) }}
@elseif ($dfilter == 'mode4')
    {{ Form::submit('Zrušit akci',['name' => 'add-huge-action','class' => 'btn btn-danger']) }}
@endif
</p>
{{ Form::close() }}
@endif

@stop
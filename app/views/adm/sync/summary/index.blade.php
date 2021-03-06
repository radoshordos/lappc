@extends('adm.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Přehled synchronizace výrobců
@stop

{{-- Content --}}
@section('content')
    {{ Form::open(['route' => ['adm.sync.summary.index', 'dfilter' => $dfilter], 'method' => 'GET', 'class' => 'form-horizontal', 'role' => 'form']) }}
    <p class="row">
        <div class="col-xs-12 text-center" style="margin-bottom: 1.5em">
            <div class="btn-group" data-toggle="buttons">
                <label class="btn btn-success {{ ($dfilter == 'manualsync' ? 'active' : NULL) }}">
                     {{ Form::radio('dfilter', 'manualsync',($dfilter == 'manualsync' ? 'true' : NULL), ['onchange' => 'this.form.submit()']); }}Manual sync
                </label>
                <label class="btn btn-success {{ ($dfilter == 'autosync' ? 'active' : NULL) }}">
                    {{ Form::radio('dfilter', 'autosync',($dfilter == 'autosync' ? 'true' : NULL), ['onchange' => 'this.form.submit()']); }}Auto sync
                </label>
                <label class="btn btn-success {{ ($dfilter == 'isystem' ? 'active' : NULL) }}">
                    {{ Form::radio('dfilter', 'isystem',($dfilter == 'isystem' ? 'true' : NULL), ['onchange' => 'this.form.submit()']); }}Pohoda
                </label>
            </div>
        </div>
    </p>
    {{ Form::close() }}

    <table class="table table-condensed table-bordered">
        <thead>
            <tr>
                <th>#ID</th>
                <th>Výrobce</th>
				<th colspan="3" class="text-center"><button type="button" class="btn btn-default btn-xs" title="Položek v SyncDB">&sum; SyncDB | Vloženo | Nevloženo</button></th>
                <th><button type="button" class="btn btn-default btn-xs" title="Položka není nalezena v synchronizaci. Položky by měly být skryty">Skrýt</button></th>
                <th><button type="button" class="btn btn-default btn-xs" title="Položka má rozdílnou cenu proti synchronizaci">Cena</button></th>
            </tr>
        </thead>
        <tbody>
        @if ($summary)
            @foreach($summary as $row)
                <tr>
                    <td>{{ $row['dev_id'] }}</td>
                    <td>{{ $row["name"] }}</td>
					<td>{{ $row['count_sync_db'] }}</td>
                    <td>{{ $row['count_sync_db_sync']}}</td>
					<td>{{ $row['count_sync_db_nosync']}}</td>
                    <td>{{ link_to_route('adm.sync.db.index', $row['count_items_hide'], ["select_basic" => "items","select_connect" => "connect", "select_mixture_dev" => $row['dev_id'], "select_join" => "noleft","select_prodmode" => "1"]) }}</td>
                    <td>{{ link_to_route('adm.sync.db.index', $row['count_price_diff'], ["select_basic" => "sync_db","select_connect" => "connect", "select_mixture_dev" => $row['dev_id'], "select_join" => "left", "select_money" => "diverse"]) }}</td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
@stop
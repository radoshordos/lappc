@extends('adm.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Záznamy importů
@stop

{{-- Content --}}
@section('content')
<table class="table">
    <thead>
        <tr>
            <th>Import proběhl</th>
            <th>Název</th>
            <th>Seskupení výrobců</th>
            <th>Účel</th>
            <th colspan="2">Položek / Aktivních</th>
			<th>
				<button type="button" class="btn btn-default btn-sm">
					<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
				</button>
			</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($record as $row)
    <tr>
        <td>{{ $row->created_at }}</td>
        <td>{{ $row->name }}</td>
        @if (isset($row->syncCsvTemplate->mixtureDev->name))
            <td>{{ $row->syncCsvTemplate->mixtureDev->name }}</td>
        @elseif (isset($row->mixtureDev->name))
            <td>{{ $row->mixtureDev->name }}</td>
        @else
            <td></td>
        @endif
        <td>{{ $row->purpose }}</td>
        <td>{{ $row->item_counter_insert }}</td>
        @if ($row->rsi_actual_count > 0)
        <td>{{ link_to_route('adm.sync.db.index', $row->rsi_actual_count, ["select_connect" => "code_prod", "join" => "inner", "limit" => 20, "record" => $row->id  ]) }}</td>
        @else
        <td>{{ $row->rsi_actual_count }}</td>
        @endif
		<td>
			{{ Form::open(['method' => 'DELETE', 'route' => ['adm.sync.db.destroy', $row->id]]) }}
			{{ Form::submit('X',['class' => 'btn btn-danger btn-xs']) }}
			{{ Form::close() }}
		</td>
    </tr>
    @endforeach
    </tbody>
</table>
@stop

































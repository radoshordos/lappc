@extends('adm.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Odkud přišli návštěvníci?
@stop

{{-- Content --}}
@section('content')
    <blockquote>
        {{ Form::open(['route' => ['adm.stats.useraccesshistory.index'],'method' => 'GET','class' => 'form-horizontal', 'role' => 'form']) }}
		<div class="row">
			<div class="col-xs-2">
				{{ Form::text('remote_addr',$input['remote_addr'],['id'=> 'remote_addr', 'placeholder' => 'IP Adresa', 'maxlength' => '48', 'class'=> 'form-control']) }}
			</div>
			<div class="col-xs-2">
				{{ Form::input('date', 'date', NULL, ['max' => date("Y-m-d"),'placeholder' => 'Datum','class'=> 'form-control']) }}
			</div>
			<div class="col-xs-2">
				{{ Form::text('http_referer',$input['http_referer'],['id'=> 'http_referer', 'placeholder' => 'Odkazující stránka',  'maxlength' => '48', 'class'=> 'form-control']) }}
			</div>
			<div class="col-xs-2">
				{{ Form::text('request_uri',$input['request_uri'],['id'=> 'request_uri','placeholder' => 'Vstupní stránka', 'maxlength' => '48', 'class'=> 'form-control']) }}
			</div>
			<div class="col-xs-2">
				{{ Form::select('select_limit', $input['select_limit'], $input['choice_limit'], ['id'=> 'select_limit', 'class'=> 'form-control']) }}
			</div>
			<div class="col-xs-2">
				{{ Form::submit('Vyhledat',['class'=> 'form-control btn-primary']) }}
			</div>
		</div>
		{{ Form::close() }}
	</blockquote>

	@if ($hit)
		<table class="table table-condensed table-striped">
			<tr>
				<th class="col-xs-1">#ID</th>
				<th class="col-xs-1">IP Adresa</th>
				<th class="col-xs-2">Čas</th>
				<th>Odkazující stránka</th>
				<th>Vstupní stránka</th>
			</tr>
		@foreach($hit as $row)
			<tr>
				<td style="font-size: small">{{ $row->id }}</td>
				<td style="font-size: small">{{ $row->remote_addr }}</td>
				<td style="font-size: small">{{ date("d.m.Y H:i", $row->created_int); }}</td>
				<td style="font-size: small"><a href="{{ $row->http_referer }}">{{ htmlspecialchars(substr($row->http_referer, 0, 120)) }}</a></td>
				<td style="font-size: small">{{ $row->request_uri }}</td>
			</tr>
		@endforeach
		</table>
	@endif
@stop
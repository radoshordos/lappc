@extends('adm.layouts.email')

{{-- Web site Title --}}
@section('title')
@parent Objednávka č. {{ $order->bod_id.date('md',strtotime($order->bod_created_at)) }} @stop

{{-- Content --}}
@section('content')
	<table class="table">
		<tr>
			<th>#</th>
			<th>Stav objednávky</th>
			<th>Datum</th>
			<th>Jméno</th>
			<th>Platba</th>
			<th></th>
			<th></th>
		</tr>
		<tr>
			<td>{{ $order->bod_id.date('md',strtotime($order->bod_created_at))  }}</td>
			<td>{{ $order->bod_created_at }}</td>
			<td>{{ $order->bodc_customer_fullname }}</td>
			<td>{{ $order->pa_name }}</td>
		</tr>
	</table>

	@if(!empty($bodi))
		<table class="table">
			<tr>
				<th>prod_fullname</th>
			</tr>
			@foreach($bodi as $item)
				<tr>
					<td>{{ $item->prod_fullname  }}</td>
				</tr>
			@endforeach
		</table>
	@endif
@stop

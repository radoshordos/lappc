@extends('adm.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent Správa objednávek @stop

{{-- Content --}}
@section('content')
    @if(!empty($bodc))
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
            @foreach($bodc as $row)
                <tr>
                    <td>{{ $row->bod_id.date('md',strtotime($row->bod_created_at))  }}</td>
                    <td>{{ Form::select('order_status_id',$buy_order_status,$row->bod_order_status_id,['required' => 'required','class'=> 'form-control']) }}</td>
                    <td>{{ $row->bod_created_at }}</td>
                    <td>{{-- $row->bodc_customer_fullname --}}</td>
                    <td>{{ $row->pa_name }}</td>
					<td><a href="{{ URL::route('adm.buy.order.show',[$row->bod_id,'design' => 'pdf']) }}"><i class="fa fa-file-pdf-o"></i></a></td>
					<td><a href="{{ URL::route('adm.buy.order.show',[$row->bod_id,'design' => 'html']) }}"><i class="fa fa-street-view"></i></a></td>
                </tr>
            @endforeach
        </table>
    @endif
@stop

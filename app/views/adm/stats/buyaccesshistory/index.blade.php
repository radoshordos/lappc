@extends('adm.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Odkud přišli zákazníci?
@stop

{{-- Content --}}
@section('content')
    <blockquote>
        {{ Form::open(['route' => ['adm.stats.buyaccesshistory.index'],'method' => 'GET','class' => 'form-horizontal', 'role' => 'form']) }}
        <div class="row">
            <div class="col-xs-12">
                {{ Form::select('select_limit', $input['select_limit'], $input['choice_limit'], ['id'=> 'select_limit', 'class'=> 'form-control', 'onchange' => 'this.form.submit()']) }}
            </div>
        </div>
        {{ Form::close() }}
    </blockquote>

	@if ($history)
		<table class="table table-striped table-bordered">
			@foreach($history as $row)
				<tr>
					<td>{{ substr($row['buy']['created_at'],0,-3) }} | <a href="{{ URL::route('adm.buy.order.show',[$row['buy']['id'],'design' => 'pdf']) }}">{{$row['buy']['id']}}</a></td>
					<td style="font-size: small">{{ $row['buy']['http_user_agent'] }} | {{ $row['buy']['netbios'] }}</td>
					<td style="font-size: small">{{ $row['buy']['products_total_price'] }}</td>
				</tr>
				@foreach($row['hit']->toArray() as $val)
					<tr>
						<td style="font-size: x-small">{{ date("Y-m-d H:i", $val['created_int']) }}</td>
						<td style="font-size: x-small"><a href="{{ $val['http_referer'] }}">{{ $val['http_referer'] }}</a></td>
						<td style="font-size: x-small">{{ $val['remote_addr'] }}</td>
					</tr>
				@endforeach
			@endforeach
		</table>
	@endif
@stop
@extends('adm.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent Nový kupón @stop

{{-- Content --}}
@section('content')

	{{ Form::open(['route' => 'adm.buy.coupon.store','class' => 'form-horizontal', 'role' => 'form']) }}

	<div class="form-group">
		{{ Form::label('name','Název kuponu',['class'=> 'col-sm-2 control-label']) }}
		<div class="col-sm-10">
			{{ Form::input('text','code', NULL, ['required' => 'required', 'class'=> 'form-control']) }}
		</div>
	</div>

	<div class="form-group">
		{{ Form::label('code','Kód kuponů',['class'=> 'col-sm-2 control-label']) }}
		<div class="col-sm-10">
			{{ Form::input('text','code', NULL, ['required' => 'required', 'class'=> 'form-control']) }}
		</div>
	</div>

	<div class="form-group">
		{{ Form::label('quantity_start','Počet kuponů',['class'=> 'col-sm-2 control-label']) }}
		<div class="col-sm-10">
			{{ Form::number('quantity_start',NULL,['min'=> '1','max'=> '999999','required' => 'required', 'class'=> 'form-control']) }}
		</div>
	</div>

	<div class="form-group">
		{{ Form::label('date_expiration','Platnost pokonů do',['class'=> 'col-sm-2 control-label']) }}
		<div class="col-sm-10">
			{{ Form::input('date','date_expiration',NULL,['min'=> date("Y-m-d"),'required' => 'required', 'class'=> 'form-control']) }}
		</div>
	</div>

	<p class="text-center">
		{{ link_to_route('adm.buy.coupon.index','Zobrazit všechny kupony', NULL, ['class'=>'btn btn-primary','role'=> 'button']) }}
		{{ Form::submit('Vložit nový kupon', ['class' => 'btn btn-success']) }}
	</p>

	{{ Form::close() }}

@stop
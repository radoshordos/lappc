@extends('adm.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent Přehled kupónů @stop

{{-- Content --}}
@section('content')
<p class="text-center">
	{{ link_to_route('adm.buy.coupon.create', 'Vytvořit nový kupon', NULL, ['class' => 'btn btn-success','role' => 'button']) }}
</p>
@stop
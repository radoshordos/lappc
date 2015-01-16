<?php

class CouponController extends \BaseController
{
	public function index()
	{
		return View::make('adm.buy.coupon.index', []);
	}

	public function create()
	{
		return View::make('adm.buy.coupon.create', []);
	}
}
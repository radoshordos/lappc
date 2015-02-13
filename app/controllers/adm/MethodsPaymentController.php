<?php

use \Authority\Eloquent\BuyPayment;

class MethodsPaymentController extends \BaseController
{
	public function index()
	{
		return View::make('adm.summary.payment.index', [
			"payment" => BuyPayment::orderBy('id')->get()
		]);
	}
}
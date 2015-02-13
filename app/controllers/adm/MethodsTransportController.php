<?php

use \Authority\Eloquent\BuyTransport;

class MethodsTransportController extends \BaseController
{
	public function index()
	{
		return View::make('adm.summary.transport.index', [
			"transport" => BuyTransport::orderBy('id')->get()
		]);
	}
}
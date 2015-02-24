<?php

class BuyPurchasedController extends \BaseController
{
	public function index()
	{
		return View::make('adm.buy.purchased.index', []);
	}
}
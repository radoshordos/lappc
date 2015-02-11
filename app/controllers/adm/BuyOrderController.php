<?php

use Authority\Eloquent\BuyOrderDbCustomer;

class BuyOrderController extends \BaseController
{
	CONST SIFRA = 'VeRY_STRoN1G_SeECREET_PAS3WoRD:-]';

	public function index()
	{
		return View::make('adm.buy.order.index', [
			'bodc' => BuyOrderDbCustomer::select([
				'buy_order_db_customer.order_db_id AS bodc_order_db_id',
				'buy_order_db_customer.delivery_id AS bodc_delivery_id',
				'buy_order_db_customer.payment_id AS bodc_payment_id',
				\DB::raw("AES_DECRYPT(buy_order_db_customer.customer_fullname,'" . self::SIFRA . "') AS bodc_customer_fullname"),
				'buy_order_db.id AS bod_id',
				'buy_order_db.created_at AS bod_created_at',
				'buy_payment.payment_type_id AS pa_payment_id',
				'buy_payment.alias AS pa_alias',
				'buy_payment.name AS pa_name'
			])
				->join('buy_order_db', 'buy_order_db_customer.order_db_id', '=', 'buy_order_db.id')
				->join('buy_payment', 'buy_order_db_customer.payment_id', '=', 'buy_payment.id')
				->get()
		]);
	}
}
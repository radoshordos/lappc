<?php

use Authority\Eloquent\BuyOrderDbCustomer;
use Authority\Eloquent\BuyOrderDbItems;
use Authority\Tools\SB;

class BuyOrderController extends \BaseController
{
    CONST SIFRA = 'VeRY_STRoN1G_SeECREET_PAS3WoRD:-]';

    public function index()
    {
        return View::make('adm.buy.order.index', [
            'buy_order_status' => SB::option('SELECT * FROM buy_order_status', ['id' => '[->heureka_order_status] ->desc']),
            'bodc'             => BuyOrderDbCustomer::select([
                'buy_order_db_customer.order_db_id AS bodc_order_db_id',
                'buy_order_db_customer.delivery_id AS bodc_delivery_id',
                'buy_order_db_customer.payment_id AS bodc_payment_id',
                \DB::raw("AES_DECRYPT(buy_order_db_customer.customer_fullname,'" . self::SIFRA . "') AS bodc_customer_fullname"),
                'buy_order_db.id AS bod_id',
                'buy_order_db.created_at AS bod_created_at',
                'buy_order_db.order_status_id AS bod_order_status_id',
                'buy_payment.payment_type_id AS pa_payment_id',
                'buy_payment.alias AS pa_alias',
                'buy_payment.name AS pa_name'
            ])
                ->join('buy_order_db', 'buy_order_db_customer.order_db_id', '=', 'buy_order_db.id')
                ->join('buy_payment', 'buy_order_db_customer.payment_id', '=', 'buy_payment.id')
                ->get()
        ]);
    }

    public function show($id)
    {
        $order = BuyOrderDbCustomer::select([
            'buy_order_db_customer.order_db_id AS bodc_order_db_id',
            'buy_order_db_customer.delivery_id AS bodc_delivery_id',
            'buy_order_db_customer.payment_id AS bodc_payment_id',
            \DB::raw("AES_DECRYPT(buy_order_db_customer.customer_fullname,'" . self::SIFRA . "') AS bodc_customer_fullname"),
            'buy_order_db.id AS bod_id',
            'buy_order_db.created_at AS bod_created_at',
            'buy_order_db.order_status_id AS bod_order_status_id',
            'buy_payment.payment_type_id AS pa_payment_id',
            'buy_payment.alias AS pa_alias',
            'buy_payment.name AS pa_name'
        ])
            ->join('buy_order_db', 'buy_order_db_customer.order_db_id', '=', 'buy_order_db.id')
            ->join('buy_payment', 'buy_order_db_customer.payment_id', '=', 'buy_payment.id')
            ->where('buy_order_db.id', '=', $id)
            ->first();

        $bodi = BuyOrderDbItems::where('order_id', '=', $id)->get();

        if (Input::get('design') == 'pdf') {
            return PDF::loadView('adm.buy.order.show', [
                'order' => $order,
                'bodi'  => $bodi
            ])->stream();
        } else {
            return View::make('adm.buy.order.show', [
                'order' => $order,
                'bodi'  => $bodi
            ]);
        }
    }
}
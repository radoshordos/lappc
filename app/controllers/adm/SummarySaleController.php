<?php

use Authority\Eloquent\ItemsSale;

class SummarySaleController extends \BaseController
{
    protected $sale;

    function __construct(ItemsSale $sale)
    {
        $this->sale = $sale;
    }

    public function index()
    {
        if (Request::isMethod('post')) {
            foreach (Input::get('visible') as $key => $val) {
                DB::update('UPDATE items_sale SET visible = ? WHERE id = ?', array($val, $key));
            }
        }

        return View::make('adm.summary.sale.index', array(
            'sale' => DB::table('items_sale')
                ->select(array('items_sale.*',
                    DB::raw('(SELECT COUNT(*) FROM items WHERE items.sale_id = items_sale.id) AS sale_items'),
                    DB::raw('(SELECT COUNT(*) FROM akce WHERE akce.sale_id = items_sale.id) AS sale_akce')
                ))
                ->groupBy('items_sale.id')
                ->get()
        ));
    }
}
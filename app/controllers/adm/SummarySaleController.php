<?php

use Authority\Eloquent\ProdSale;

class SummarySaleController extends \BaseController
{
    protected $sale;

    function __construct(ProdSale $sale)
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
            'sale' => DB::table('prod_sale')
                ->select(array('prod_sale.*',
                    DB::raw('(SELECT COUNT(*) FROM prod WHERE prod.sale_id = prod_sale.id) AS sale_items'),
                    DB::raw('(SELECT COUNT(*) FROM akce WHERE akce.sale_id = prod_sale.id) AS sale_akce')
                ))
                ->groupBy('prod_sale.id')
                ->get()
        ));
    }
}
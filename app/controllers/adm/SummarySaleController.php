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
				DB::update('UPDATE prod_sale SET visible = ? WHERE id = ?', [$val, $key]);
			}
		}

		return View::make('adm.summary.sale.index', [
			'sale_prod'   => DB::table('prod_sale')
				->select(['prod_sale.*', DB::raw('(SELECT COUNT(*) FROM prod WHERE prod.sale_id = prod_sale.id) AS sale_items')])
				->groupBy('prod_sale.id')->get(),
			'sale_action' => DB::table('akce_sale')
				->select(['akce_sale.*', DB::raw('(SELECT COUNT(*) FROM akce WHERE akce.akce_sale_id = akce_sale.id) AS sale_akce')])
				->groupBy('akce_sale.id')->get()
		]);
	}
}
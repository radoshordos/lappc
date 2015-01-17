<?php namespace Authority\Runner\Task\Recalculate;

use Authority\Runner\Task\iRun;
use Authority\Runner\Task\TaskMessage;
use Authority\Eloquent\Prod;
use Authority\Eloquent\Items;
use Authority\Eloquent\BuyOrderDbItems;
use Authority\Eloquent\ViewProd;
use Authority\Mapper\ViewProdMapper;

class ProdSearch extends TaskMessage implements iRun
{
	public function __construct($db)
	{
		parent::__construct($db);
		$this->run();
	}

	public function run()
	{
		$this->searchInSell();
		$this->searchInItemsCode();
	}

	public function searchInItemsCode()
	{
		$prod_all = Prod::select(['id'])->get();
		if (!empty($prod_all)) {
			foreach ($prod_all as $pid) {
				$ic = Items::select('code_prod')->where('prod_id', '=', $pid->id)->whereRaw('LENGTH(code_prod)>0')->lists('code_prod');
				if (!empty($ic)) {
					$prod = Prod::find($pid->id);
					$prod->search_codes = implode('|', $ic);
					$prod->save();
				}
			}
		}
		$this->addMessage("Provedena aktualizace vyhledávacích kódů položek");
	}

	public function searchInPrice()
	{
		$prod_all = ViewProd::all();
		if (!empty($prod_all)) {
			foreach ($prod_all as $pid) {
				$vpm = (new ViewProdMapper)->fetchRow($pid);
				$prod = Prod::find($vpm->getProdId());
				$prod->search_price = $vpm->getPrice();
				$prod->save();
			}
		}
		$this->addMessage("Provedena aktualizace cen pro setřídění");
	}

	public function searchInSell()
	{
		$bodi = BuyOrderDbItems::selectRaw("prod.id AS prod_id, COUNT(prod.id) AS count_prod")
			->leftJoin('items', 'buy_order_db_items.item_id', '=', 'items.id')
			->leftJoin('prod', 'items.prod_id', '=', 'prod.id')
			->whereNotNull('prod.id')
			->groupBy('items.prod_id')
			->get();

		if (!empty($bodi)) {
			foreach ($bodi as $row) {
				$prod = Prod::find($row->prod_id);
				$prod->search_sell = $row->count_prod;
				$prod->save();
			}
		}
		$this->addMessage("Provedena aktualizace prodaných produktů");
	}
}
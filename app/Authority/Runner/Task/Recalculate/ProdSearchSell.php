<?php namespace Authority\Runner\Task\Recalculate;

use Authority\Runner\Task\iRun;
use Authority\Runner\Task\TaskMessage;
use Authority\Eloquent\Prod;

class ProdSearchSell extends TaskMessage implements iRun
{
	public function __construct($db)
	{
		parent::__construct($db);
	}

	public function run()
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
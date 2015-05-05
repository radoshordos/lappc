<?php namespace Authority\Runner\Task\Recalculate;

use Authority\Runner\Task\iRun;
use Authority\Runner\Task\TaskMessage;
use Authority\Eloquent\Prod;
use Authority\Tools\SF;

class ProdSearchAlias extends TaskMessage implements iRun
{
	public function __construct($db)
	{
		parent::__construct($db);
	}

	public function run()
	{
		$prod_all = Prod::select(['id', 'alias'])->get();
		foreach ($prod_all as $row) {
			$prod = Prod::find($row->id);
			$prod->search_alias = SF::friendlyString($row->alias);
			$prod->save();
		}
		$this->addMessage("Provedena aktualizace vyhledávacích textů");
	}
}
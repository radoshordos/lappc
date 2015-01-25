<?php namespace Authority\Runner\Task\Recalculate;

use Authority\Runner\Task\iRun;
use Authority\Runner\Task\TaskMessage;
use Authority\Eloquent\Prod;
use Authority\Eloquent\Items;

class ProdSearchCode extends TaskMessage implements iRun
{
	public function __construct($db)
	{
		parent::__construct($db);
		$this->run();
	}

	public function run()
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
}
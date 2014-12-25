<?php namespace Authority\Runner\Task\Recalculate;

use Authority\Runner\Task\iRun;
use Authority\Runner\Task\TaskMessage;
use Authority\Eloquent\Prod;
use Authority\Eloquent\Items;
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
		$this->searchInAlias();
		$this->searchInItemsCode();
		$this->searchInPrice();
	}

	public function searchInAlias()
	{
		$prod_all = Prod::select(['id', 'alias'])->get();
		foreach ($prod_all as $row) {
			$prod = Prod::find($row->id);
			$prod->search_alias = $this->friendlyString($row->alias);
			$prod->save();
		}
		$this->addMessage("Provedena aktualizace vyhledávacích textů");
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

	private function friendlyString($source)
	{
		$chars = ['"' => '', '+' => '', ' ' => '', '(' => '', ')' => '', '#' => '', ':' => '', ',' => '', '\'' => '', '.' => '', '\'' => '', '-' => ''];
		$url = str_replace(array_keys($chars), array_values($chars), trim(strtolower($source)));
		$url = preg_replace('~[^\\pL0-9_]+~u', '-', $url);
		$url = trim($url, "-");
		$url = iconv("utf-8", "us-ascii//TRANSLIT", $url);
		$url = strtolower($url);
		return preg_replace('~[^-a-z0-9_]+~', '', $url);
	}
}
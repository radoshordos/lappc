<?php namespace Authority\Runner\Task\Recalculate;

use Authority\Runner\Task\iRun;
use Authority\Runner\Task\TaskMessage;
use Authority\Eloquent\Prod;

class ProdSearchAlias extends TaskMessage implements iRun
{
	public function __construct($db)
	{
		parent::__construct($db);
		$this->run();
	}

	public function run()
	{
		$prod_all = Prod::select(['id', 'alias'])->get();
		foreach ($prod_all as $row) {
			$prod = Prod::find($row->id);
			$prod->search_alias = $this->friendlyString($row->alias);
			$prod->save();
		}
		$this->addMessage("Provedena aktualizace vyhledávacích textů");
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
<?php namespace Authority\Runner\Task\Fix;

use Authority\Runner\Task\iRun;
use Authority\Runner\Task\TaskMessage;
use Authority\Eloquent\Prod;

class ProdWithoutItem extends TaskMessage implements iRun
{
	public function __construct($db)
	{
		parent::__construct($db);
		$this->run();
	}

	public function run()
	{
		$count = 0;
		$row = Prod::where('ic_all', '=', '0')->get(['id']);

		if (count($row) > 0) {
			foreach ($row as $val) {
				$count += Prod::destroy($val->id);
			}
		}
		$this->addMessage("Odstraněno produktů bez položek : <b>" . $count . "</b>");
	}
}
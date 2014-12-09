<?php namespace Authority\Runner\Task\Events;

use Authority\Eloquent\AkceTempl;
use Authority\Runner\Task\iRun;
use Authority\Runner\Task\TaskMessage;

class OnOldAkceTemplate extends TaskMessage implements iRun
{

	public function __construct($db)
	{
		parent::__construct($db);
		$this->run();
	}

	public function run()
	{

		$row = AkceTempl::whereRaw("WHERE DATE(endtime) < DATE(NOW())");

		var_dump($row);


	}
}
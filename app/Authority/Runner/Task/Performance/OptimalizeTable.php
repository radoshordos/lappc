<?php namespace Authority\Runner\Task\Performance;

use Authority\Runner\Task\iRun;
use Authority\Runner\Task\TaskMessage;
use \DB;
use \PDO;
use \PDOException;

class OptimalizeTable extends TaskMessage implements iRun
{
	private $pdo;

	public function __construct($db)
	{
		parent::__construct($db);
		$this->pdo = DB::connection()->getPdo();
	}

	function itemDiscontinued()
	{
		$tableList = [];
		try {
			$result = $this->pdo->query("SHOW TABLES");
			while ($row = $result->fetch(\PDO::FETCH_NUM)) {
				$tableList[] = $row[0];
			}
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
		return $tableList;
	}

	public function run()
	{
		$inc = 0;
		$tables = $this->itemDiscontinued();
		foreach ($tables as $table) {
			$inc++;
			$this->pdo->query("OPTIMIZE TABLE $table");
		}
		$this->addMessage("Optimalizováno tabulek databáze : <b>" . $inc . "</b>");
	}
}
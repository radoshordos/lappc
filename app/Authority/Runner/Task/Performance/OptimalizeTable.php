<?php

namespace Authority\Runner\Task\Performance;

use \DB;
use \PDO;
use \PDOException;
use Authority\Runner\Task\TaskMessage;

class OptimalizeTable extends TaskMessage
{
    public function __construct($db)
    {
        parent::__construct($db);
        $pdo = DB::connection()->getPdo();
        $tables = $this->itemDiscontinued($pdo);
        $this->runOptimalizeTables($pdo, $tables);
    }

    function itemDiscontinued($pdo)
    {
        $tableList = array();
        try {
            $result = $pdo->query("SHOW TABLES");
            while ($row = $result->fetch(\PDO::FETCH_NUM)) {
                $tableList[] = $row[0];
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        return $tableList;
    }

    public function runOptimalizeTables($pdo, array $tables)
    {
        $inc = 0;
        foreach ($tables as $table) {
            $inc++;
            $pdo->query("OPTIMIZE TABLE $table");
        }
        $this->addMessage("Optimalizováno tabulek databáze : <b>" . $inc . "</b>");
    }

}
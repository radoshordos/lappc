<?php

namespace Authority\Runner\Task;

abstract class TaskMaker extends TaskMessage
{
    protected $table;

    public function __construct($table)
    {
        $this->table = $table;
    }

    public function getClassName()
    {
        return $this->table->class;
    }


}
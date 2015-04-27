<?php namespace Authority\Runner\Task\Store;

use Authority\Runner\Task\TaskMessage;
use Authority\Eloquent\RecordSyncImport;

class AbstractSync
{
    protected $tm;
    protected $table;

    public function __construct($table)
    {
        $this->table = $table;
        $this->tm = new TaskMessage($table);
    }

    public function getFeedDirName()
    {
        return $this->getSyncUploadDirectory() . $this->getFile();
    }

    public function getSyncUploadDirectory()
    {
        return __DIR__ . "/data/";
    }

    public function getClassName()
    {
        return $this->table->class;
    }

    public function addMessage($message)
    {
        return $this->tm->addMessage($message);
    }

    public function addRecordCounter($record_id, $all, $suc, $mixture_dev_id = NULL)
    {
        $rsi = RecordSyncImport::find($record_id);
        $rsi->item_counter_all = $all;
        $rsi->item_counter_insert = $suc;
        $rsi->mixture_dev_id = $mixture_dev_id;
        $rsi->save();
    }

    public function stopTimer()
    {
        $this->tm->stopTimer();
    }

    public function getResultTime()
    {
        return $this->tm->getResultTime();
    }

    public function getMessages()
    {
        return $this->tm->getMessages();
    }
}
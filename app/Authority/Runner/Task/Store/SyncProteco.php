<?php namespace Authority\Runner\Task\Store;

class SyncProteco extends AbstractSync implements iSync
{
    const DEV_NAME = 'proteco';
    const URL_FEED = '';

    public function __construct($table_cron)
    {
        parent::__construct($table_cron);
    }

    public function getFile()
    {
        // TODO: Implement getFile() method.
    }

    public function remotelyPrepareSynchronize()
    {
        // TODO: Implement remotelyPrepareSynchronize() method.
    }

    function runSynchronizeData()
    {
        $suc = 0;
        $this->addMessage("Zpracováno záznamů : <b>" . $suc . "</b>");
    }

}
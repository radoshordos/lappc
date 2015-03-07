<?php namespace Authority\Runner\Task\Store;

class SyncNarex extends AbstractSync implements iSync
{
    const DEV_NAME = 'narex';
    const URL_FEED = '';

    public function __construct($table_cron)
    {
        parent::__construct($table_cron);
        $this->remotelyPrepareSynchronize();
        $this->runSynchronizeData();
    }

    function runSynchronizeData()
    {
        $suc = 0;
        $this->addMessage("Zpracováno záznamů : <b>" . $suc . "</b>");
    }

    public function getFile()
    {
        // TODO: Implement getFile() method.
    }

    public function remotelyPrepareSynchronize()
    {
        // TODO: Implement remotelyPrepareSynchronize() method.
    }
}
<?php namespace Authority\Runner\Task\Store;

class SyncNarex extends AbstractSync implements iSync
{
    const DEV_NAME = 'narex';
    const URL_FEED = 'https://www.narex.cz/services/prices.aspx';

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
        return self::DEV_NAME . "-" . date('Y-m') . ".xml";
    }

    public function remotelyPrepareSynchronize()
    {
        $down = new Downloader($this->getSyncUploadDirectory(), $this->getFile(), self::URL_FEED);
        $down->runDownload();
        $down->unzipDownload();
    }
}
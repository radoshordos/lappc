<?php namespace Authority\Runner\Task\Store;

use Authority\Runner\Task\TaskMessage;

class SyncBow extends TaskMessage implements iSync
{
    const DEV_NAME = 'bow';

    public function __construct($table_cron)
    {
        parent::__construct($table_cron);
        $this->remotelyPrepareSynchonized();
        $this->runSynchonizedData();
    }

    public function remotelyPrepareSynchronize()
    {
        $down1 = new Sync_Model_Downloader($this->getSyncUploadDitectory(), $this->getFile(), 'http://www.bow.cz/sellersXML/xmlfeed.zip');
        $down1->runDownload();
        $down1->unzipDownload();
    }

    public function getFile()
    {
        return self::DEV_NAME . "-" . date('Y-m') . ".zip";
    }

    public function getSyncUploadDirectory()
    {
        return __DIR__ . "/data/";
    }

    public function runSynchronizeData()
    {
        $all = $suc = 0;
        $xml = simplexml_load_file($this->getSyncUploadDitectory() . "/export.xml");

        foreach ($xml->SHOP as $item) {
            foreach ($item as $row) {
                $all++;
                $bow = new RunBow((array)$row);
                if ($bow->isUseRequired() === TRUE) {
                    $suc++;
                    $bow->insertData2Db();
                }
            }
        }
        $this->addComment("Přečteno záznamů : <b>" . $all . "</b>");
        $this->addComment("Zpracováno záznamů : <b>" . $suc . "</b>");
    }

}

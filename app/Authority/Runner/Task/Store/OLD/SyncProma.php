<?php namespace Authority\Store;

class Cron_Model_Storehouse_SyncProma extends Cron_Model_Message implements Cron_Model_Storehouse_iSync
{
    const DEV_NAME = 'proma';
    protected $curl;

    public function __construct($table_cron)
    {
        parent::__construct($table_cron);
        $this->remotelyPrepareSynchonized();
        $this->runSynchonizedData();
    }

    public function remotelyPrepareSynchonized()
    {
        $down1 = new Sync_Model_Downloader(__DIR__ . "/data/", $this->getFile(), 'http://b2b.satrade.cz/pl.php?u=83887-64-63');
        $down1->runDownload();
    }

    public function getFile()
    {
        return self::DEV_NAME . " -" . date('Y-m') . ".xml";
    }

    function runSynchonizedData()
    {
        $all = $succ = 0;
        $xml = simplexml_load_file(__DIR__ . "/data/" . $this->getFile());

        foreach ($xml->SHOP->SHOPITEM as $row) {
            $all++;
            $proma = new Cron_Model_RunProma((array)$row);
            if ($proma->isUseRequired() === TRUE) {
                $succ++;
                $proma->insertData2Db($this->db);
            }
        }
        $this->addComment("Přečteno záznamů : <b>" . $all . "</b>");
        $this->addComment("Zpracováno záznamů : <b>" . $succ . "</b>");
    }

    public function getSyncUploadDitectory()
    {
        return __DIR__ . "/data/";
    }

}

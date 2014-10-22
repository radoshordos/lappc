<?php namespace Authority\Store;

class Cron_Model_Storehouse_SyncUniag extends Cron_Model_Message implements Cron_Model_Storehouse_iSync {

    public function __construct($table_cron) {
        parent::__construct($table_cron);
        $this->file = "uniag-" . date('Y-m') . ".xml";
        $this->remotelyPrepareSynchonized();
        $this->runSynchonizedData();
    }

    public function getFile() {
        return "uniag-" . date('Y-m') . ".xml";
    }

    public function getSyncUploadDitectory() {
        return __DIR__ . "/data/";
    }

    public function remotelyPrepareSynchonized() {
        $down1 = new Sync_Model_Downloader($this->getSyncUploadDitectory(), $this->getFile(), 'http://www.uniag.biz/xmldej.php?adrkod=799&heslo=8864OneA');
        $down1->runDownload();
    }

    function runSynchonizedData() {

        $all = $succ = 0;
        $xml = simplexml_load_file($this->getSyncUploadDitectory() . $this->getFile());

        foreach ($xml as $row) {
            $all++;
            $uniag = new Cron_Model_RunUniag($row);
            if ($uniag->isUseRequired() === TRUE) {
                $succ++;
                $uniag->insertData2Db();
            }
        }
        $this->addComment("Přečteno záznamů : <b>" . $all . "</b>");
        $this->addComment("Zpracováno záznamů : <b>" . $succ . "</b>");
    }

}

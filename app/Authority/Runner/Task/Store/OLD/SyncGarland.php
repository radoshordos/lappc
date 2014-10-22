<?php namespace Authority\Store;

class Cron_Model_Storehouse_SyncGarland extends Cron_Model_Message implements Cron_Model_Storehouse_iSync {

    public function __construct($table_cron) {
        parent::__construct($table_cron);
        $this->remotelyPrepareSynchonized();
        $this->runSynchonizedData();
    }

    public function getFile() {
        return "garland-" . date('Y-m') . ".xml";
    }

    public function getSyncUploadDitectory() {
        return __DIR__ . "/data/";
    }

    public function remotelyPrepareSynchonized() {
        $down1 = new Sync_Model_Downloader($this->getSyncUploadDitectory(), $this->getFile(), 'http://data.garland.cz/exportzbozi.xml');
        $down1->runDownload(TRUE);
    }

    function runSynchonizedData() {
        $all = $succ = 0;
        $xml = (array) simplexml_load_file($this->getSyncUploadDitectory() . $this->getFile());

        foreach ($xml['ARTIKL'] as $row) {

            $all++;
            $garland = new Cron_Model_Storehouse_RunGarland((array) $row);

            if ($garland->isUseRequired() === TRUE) {
                $garland->insertData2Db($this->db);
                $succ++;
            }
        }

        $this->addComment("Přečteno záznamů : <b>" . $all . "</b>");
        $this->addComment("Zpracováno záznamů : <b>" . $succ . "</b>");
    }

}

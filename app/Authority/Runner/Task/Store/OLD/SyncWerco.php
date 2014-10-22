<?php namespace Authority\Store;

class Cron_Model_Storehouse_SyncWerco extends Cron_Model_Message implements Cron_Model_Storehouse_iSync {

    protected $curl;

    public function __construct($table_cron) {
        parent::__construct($table_cron);
        $this->curl = new Model_Mycurl("http://office.werco.cz/xml/zasoby.xml");
        $this->curl->setName("WERCO");
        $this->curl->setPass("W9876");
        $this->curl->useAuth(true);
        $this->curl->createCurl();
        $this->remotelyPrepareSynchonized();
        $this->runSynchonizedData();
    }

    public function getFile() {
        return "werco-" . date('Y-m') . ".xml";
    }

    public function getSyncUploadDitectory() {
        return __DIR__ . "/data/";
    }

    public function remotelyPrepareSynchonized() {
        $down1 = new Sync_Model_Downloader($this->getSyncUploadDitectory(), $this->getFile(), $this->curl->__tostring());
        $down1->runDownload(false);
    }

    function runSynchonizedData() {

        $all = $succ = 0;
        $xml = simplexml_load_file($this->getSyncUploadDitectory() . $this->getFile());

        foreach ($xml as $row) {
            $all++;
            $werco = new Cron_Model_RunWerco((array) $row);

            if ($werco->isUseRequired() === TRUE) {
                $succ++;
                $werco->insertData2Db();
            }
        }
        $this->addComment("Přečteno záznamů : <b>" . $all . "</b>");
        $this->addComment("Zpracováno záznamů : <b>" . $succ . "</b>");
    }

}

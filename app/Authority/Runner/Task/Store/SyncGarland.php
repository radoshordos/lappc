<?php namespace Authority\Runner\Task\Store;

use Authority\Eloquent\RecordSyncImport;
use Authority\Runner\Task\TaskMessage;

class SyncGarland extends TaskMessage implements iSync
{
    const DEV_NAME = 'garland';

    public function __construct($table_cron)
    {
        parent::__construct($table_cron);
        $this->remotelyPrepareSynchronize();
        $this->runSynchronizeData();
    }

    public function remotelyPrepareSynchronize()
    {
        $down1 = new Downloader($this->getSyncUploadDirectory(), $this->getFile(), 'http://data.garland.cz/exportzbozi.xml');
        $down1->runDownload(true);
    }

    public function getSyncUploadDirectory()
    {
        return __DIR__ . "/data/";
    }

    public function getFile()
    {
        return self::DEV_NAME . "-" . date('Y-m') . ".xml";
    }

    function runSynchronizeData()
    {
        $all = $suc = 0;
        $xml = (array)simplexml_load_file($this->getSyncUploadDirectory() . $this->getFile());
        $record_id = strtotime('now');

        foreach ($xml['ARTIKL'] as $row) {

            $all++;
            $garland = new RunGarland((array)$row, $record_id);
            $garland->setSyncIdDev();
/*
            if ($garland->isUseRequired() === true) {
                $garland->insertData2Db($this->db);
                $suc++;
            }
*/
       }
/*
        RecordSyncImport::create([
            'id'           => $record_id,
            'purpose'      => 'autosync',
            'item_counter' => $suc,
            'name'         => __CLASS__,
            'created_at'   => date("Y-m-d H:i:s", $record_id)
        ]);
*/
      //  $this->addComment("Přečteno záznamů : <b>" . $all . "</b>");
      //  $this->addComment("Zpracováno záznamů : <b>" . $suc . "</b>");
    }

}

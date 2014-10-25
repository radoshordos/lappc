<?php namespace Authority\Runner\Task\Store;

use Authority\Eloquent\RecordSyncImport;
use Authority\Runner\Task\TaskMessage;

class SyncBow extends TaskMessage implements iSync
{
    const DEV_NAME = 'bow';

    public function __construct($table_cron)
    {
        parent::__construct($table_cron);
        $this->remotelyPrepareSynchronize();
        $this->runSynchronizeData();
    }

    public function remotelyPrepareSynchronize()
    {
        $down = new Downloader($this->getSyncUploadDirectory(), $this->getFile(), 'http://www.bow.cz/sellersXML/xmlfeed.zip');
        $down->runDownload();
        $down->unzipDownload();
    }

    public function getSyncUploadDirectory()
    {
        return __DIR__ . "/data/";
    }

    public function getFile()
    {
        return self::DEV_NAME . "-" . date('Y-m') . ".zip";
    }

    public function runSynchronizeData()
    {
        $all = $suc = 0;
        $xml = simplexml_load_file($this->getSyncUploadDirectory() . "/export.xml");
        $record_id = strtotime('now');

        foreach ($xml->SHOP as $item) {
            foreach ($item as $row) {
                $all++;
                $bow = new RunBow((array)$row, $record_id);
                if ($bow->isUseRequired() === TRUE) {
                    $suc++;
                    $bow->insertData2Db();
                }
            }
        }

        RecordSyncImport::create([
            'id'           => $record_id,
            'purpose'      => 'autosync',
            'item_counter' => $suc,
            'name'         => __CLASS__,
            'created_at'   => date("Y-m-d H:i:s", $record_id)
        ]);

        $this->addMessage("Přečteno záznamů : <b>" . $all . "</b>");
        $this->addMessage("Zpracováno záznamů : <b>" . $suc . "</b>");
    }

}
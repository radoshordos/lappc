<?php namespace Authority\Runner\Task\Store;

use Authority\Eloquent\RecordSyncImport;
use Authority\Runner\Task\TaskMessage;

class SyncProma extends TaskMessage implements iSync
{
    const DEV_NAME = 'proma';
    protected $curl;

    public function __construct($table_cron)
    {
        parent::__construct($table_cron);
        $this->remotelyPrepareSynchronize();
        $this->runSynchronizeData();
    }

    public function remotelyPrepareSynchronize()
    {
        $down1 = new Downloader(__DIR__ . "/data/", $this->getFile(), 'http://b2b.satrade.cz/pl.php?u=83887-64-63');
        $down1->runDownload();
    }

    public function getFile()
    {
        return self::DEV_NAME . "-" . date('Y-m') . ".xml";
    }

    function runSynchronizeData()
    {
        $all = $suc = 0;
        $xml = simplexml_load_file(__DIR__ . "/data/" . $this->getFile());
        $record_id = strtotime('now');

        foreach ($xml->SHOP->SHOPITEM as $row) {
            $all++;
            $proma = new RunProma((array)$row, $record_id);
            if ($proma->isUseRequired() === TRUE) {
                $suc++;
                $proma->insertData2Db($this->db);
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

    public function getSyncUploadDirectory()
    {
        return __DIR__ . "/data/";
    }

}

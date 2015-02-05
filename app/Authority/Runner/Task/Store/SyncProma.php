<?php namespace Authority\Runner\Task\Store;

use Authority\Eloquent\RecordSyncImport;

class SyncProma extends AbstractSync implements iSync
{
    const DEV_NAME = 'proma';
    const URL_FEED = 'http://b2b.satrade.cz/pl.php?u=83887-64-63';

    public function __construct($table_cron)
    {
        parent::__construct($table_cron);
        $this->remotelyPrepareSynchronize();
        $this->runSynchronizeData();
    }

    public function remotelyPrepareSynchronize()
    {
        $down = new Downloader($this->getSyncUploadDirectory(), $this->getFile(), self::URL_FEED);
        $down->runDownload();
    }

    public function getFile()
    {
        return self::DEV_NAME . "-" . date('Y-m') . ".xml";
    }

    function runSynchronizeData()
    {
        $all = $suc = 0;
        $xml = simplexml_load_file($this->getFeedDirName());
        $record_id = strtotime('now');

        RecordSyncImport::create([
            'id'         => $record_id,
            'purpose'    => 'autosync',
            'name'       => __CLASS__,
            'created_at' => date("Y-m-d H:i:s", $record_id)
        ]);

        foreach ($xml->SHOP->SHOPITEM as $item) {

            $all++;
            $arr_item = array_filter((array)$item);
            $run = new RunProma($arr_item, $record_id);

            if ($run->isUseRequired() === TRUE) {
                $suc++;
                $run->insertData2Db($this->db);
            }
        }

        $this->addRecordCounter($record_id, $suc);
        $this->addMessage("Přečteno záznamů : <b>" . $all . "</b>");
        $this->addMessage("Zpracováno záznamů : <b>" . $suc . "</b>");
    }
}
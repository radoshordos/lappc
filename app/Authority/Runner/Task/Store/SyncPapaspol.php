<?php namespace Authority\Runner\Task\Store;

use Authority\Eloquent\RecordSyncImport;

class SyncPapaspol extends AbstractSync implements iSync
{
    const MIXTURE_DEV_ID = 1018;
    const DEV_NAME = 'papaspol';
    const URL_FEED = 'http://www.papaspol.cz/XML/zbozi.xml';

    public function __construct($table_cron)
    {
        parent::__construct($table_cron);
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

        foreach ($xml->SHOPITEM as $item) {

            $all++;
            $arr_item = array_filter((array)$item);
            $run = new RunPapaspol($arr_item, $record_id);

            if ($run->isUseRequired() === TRUE) {
                $suc++;
                $run->insertData2Db();
            }
        }

        $this->addRecordCounter($record_id, $all, $suc);
        $this->addMessage("Přečteno záznamů : <b>" . $all . "</b>");
        $this->addMessage("Zpracováno záznamů : <b>" . $suc . "</b>");
    }
}
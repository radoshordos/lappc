<?php namespace Authority\Runner\Task\Store;

use Authority\Eloquent\RecordSyncImport;

class SyncProma extends AbstractSync implements iSync
{
    const MIXTURE_DEV_ID = 1015;
    const DEV_NAME = 'proma';
    const URL_FEED = 'http://b2b.satrade.cz/pl.php?u=3db8bf2f-6f09-45af-b8ea-0b1fc5e78d66';

    public function __construct($table_cron)
    {
        parent::__construct($table_cron);
        $this->remotelyPrepareSynchronize();
        $this->runSynchronizeData();
    }

    public function remotelyPrepareSynchronize()
    {
        $down = new Downloader($this->getSyncUploadDirectory(), $this->getFile(), self::URL_FEED);
        $down->runDownload(TRUE);
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
            $run = new RunProma($arr_item, $record_id);

            if ($run->isUseRequired() === TRUE) {
                $suc++;
                $run->insertData2Db();
            }
        }

        $this->addRecordCounter($record_id, $all, $suc, self::MIXTURE_DEV_ID);
        $this->addMessage("Přečteno záznamů : <b>" . $all . "</b>");
        $this->addMessage("Zpracováno záznamů : <b>" . $suc . "</b>");
    }
}
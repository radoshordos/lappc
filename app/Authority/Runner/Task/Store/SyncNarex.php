<?php namespace Authority\Runner\Task\Store;

use Authority\Eloquent\RecordSyncImport;

class SyncNarex extends AbstractSync implements iSync
{
    const DEV_NAME = 'narex';
    const URL_FEED = 'https://www.narex.cz/services/prices.aspx';
    const MIXTURE_DEV_ID = 10;

    public function __construct($table_cron)
    {
        parent::__construct($table_cron);
//        $this->remotelyPrepareSynchronize();
        $this->runSynchronizeData();
    }

    public function getFile()
    {
        return self::DEV_NAME . "-" . date('Y-m') . ".xml";
    }

    public function remotelyPrepareSynchronize()
    {
      //  $down = new Downloader($this->getSyncUploadDirectory(), $this->getFile(), self::URL_FEED);
    }

    function runSynchronizeData()
    {
        $all = $suc = 0;
        $xml = simplexml_load_file($this->getSyncUploadDirectory() . "narex-2015-03.xml");
        $record_id = strtotime('now');

        RecordSyncImport::create([
            'id'         => $record_id,
            'purpose'    => 'autosync',
            'name'       => __CLASS__,
            'created_at' => date("Y-m-d H:i:s", $record_id)
        ]);

        foreach ($xml as $item) {

            $all++;
            $arr_item = array_filter((array)$item);
            $run = new RunNarex($arr_item, $record_id);

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
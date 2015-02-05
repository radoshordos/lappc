<?php namespace Authority\Runner\Task\Store;

use Authority\Eloquent\RecordSyncImport;

class SyncGarland extends AbstractSync implements iSync
{
    const DEV_NAME = 'garland';
    const URL_FEED = 'http://data.garland.cz/exportzbozi.xml';

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
        $xml = (array)simplexml_load_file($this->getFeedDirName());
        $record_id = strtotime('now');

        RecordSyncImport::create([
            'id'         => $record_id,
            'purpose'    => 'autosync',
            'name'       => __CLASS__,
            'created_at' => date("Y-m-d H:i:s", $record_id)
        ]);

        foreach ($xml['ARTIKL'] as $item) {

            $all++;
            $arr_item = array_filter((array)$item);
            $run = new RunGarland($arr_item, $record_id);

            if ($run->isUseRequired() === TRUE) {
                $run->insertData2Db();
                $suc++;
            }
        }

        $this->addRecordCounter($record_id, $suc);
        $this->addMessage("Přečteno záznamů : <b>" . $all . "</b>");
        $this->addMessage("Zpracováno záznamů : <b>" . $suc . "</b>");
    }
}
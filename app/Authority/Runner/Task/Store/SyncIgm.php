<?php namespace Authority\Runner\Task\Store;

use Authority\Eloquent\RecordSyncImport;
use Authority\Runner\Task\TaskMessage;

class SyncIgm extends TaskMessage implements iSync
{
    const DEV_NAME = 'igm';

    public function __construct($table_cron)
    {
        parent::__construct($table_cron);
        $this->remotelyPrepareSynchronize();
        $this->runSynchronizeData();
    }

    public function remotelyPrepareSynchronize()
    {
        $down1 = new Downloader($this->getSyncUploadDirectory(), $this->getFile(), 'http://www.fachshop.cz/out/xmlfeed/igm.xml');
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

    public function runSynchronizeData()
    {

        $all = $suc = 0;
        $file = file_get_contents($this->getSyncUploadDirectory() . $this->getFile());
        $chars = ['<![CDATA[' => "", ']]>' => ''];
        $file = (string)str_replace(array_keys($chars), array_values($chars), $file);

        $xml = (array)simplexml_load_string($file);
        $record_id = strtotime('now');

        RecordSyncImport::create([
            'id'           => $record_id,
            'purpose'      => 'autosync',
            'name'         => __CLASS__,
            'created_at'   => date("Y-m-d H:i:s", $record_id)
        ]);

        foreach ((array)$xml as $item) {
            foreach ((array)$item as $row) {

                $all++;
                $igm = new RunIgm((array)$row, $record_id);
                $igm->setSyncIdDev();

                if ($igm->isUseRequired() === true) {
                    $suc++;
                    $igm->insertData2Db();
                }
            }
        }

        $rsi = RecordSyncImport::find($record_id);
        $rsi->item_counter = $suc;
        $rsi->save();

        $this->addMessage("Přečteno záznamů : <b>" . $all . "</b>");
        $this->addMessage("Zpracováno záznamů : <b>" . $suc . "</b>");
    }

}
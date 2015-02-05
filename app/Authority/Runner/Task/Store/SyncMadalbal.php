<?php namespace Authority\Runner\Task\Store;

use Authority\Eloquent\RecordSyncImport;

class SyncMadalbal extends AbstractSync implements iSync
{
    const DEV_NAME = 'madalbal';
    const URL_FEED = 'http://shop.madalbal.cz/katalog/feeds/products.xml';

    public function __construct($table_cron)
    {
        parent::__construct($table_cron);
        $this->curl = new MyuCurl(self::URL_FEED);
        $this->curl->setName("27634493/0");
        $this->curl->setPass("NAD276ph");
        $this->curl->useAuth(TRUE);
        $this->curl->createCurl();
        $this->remotelyPrepareSynchronize();
        $this->runSynchronizeData();
    }

    public function remotelyPrepareSynchronize()
    {
        $down = new Downloader($this->getSyncUploadDirectory(), $this->getFile(), $this->curl->__tostring());
        $down->runDownload(FALSE);
        $down->unzipDownload();
    }

    public function getFile()
    {
        return self::DEV_NAME . "-" . date('Y-m') . ".xml";
    }

    public function runSynchronizeData()
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

        foreach ($xml as $x) {
            if (!empty($x)) {
                foreach ($x as $item) {

                    $all++;
                    $arr_item = array_filter((array)$item);
                    $run = new RunMadalbal($arr_item, $record_id);

                    if ($run->isUseRequired() === TRUE) {
                        $suc++;
                        $run->insertData2Db();
                    }
                }
            }
        }

        $this->addRecordCounter($record_id, $all, $suc);
        $this->addMessage("Přečteno záznamů : <b>" . $all . "</b>");
        $this->addMessage("Zpracováno záznamů : <b>" . $suc . "</b>");
    }
}
<?php namespace Authority\Runner\Task\Store;

use Authority\Eloquent\RecordSyncImport;

class SyncMadalbal extends AbstractSync implements iSync
{
    const MIXTURE_DEV_ID = 1013;
    const DEV_NAME = 'madalbal';
    const URL_FEED = 'http://shop.madalbal.cz/katalog/feeds/products.xml';
    const USER = "27634493/0";
    const PASS = 'NAD276ph';

    public function __construct($table_cron)
    {
        parent::__construct($table_cron);
    }

    public function run()
    {
        $this->remotelyPrepareSynchronize();
        $this->runSynchronizeData();
    }

    public function remotelyPrepareSynchronize()
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, self::URL_FEED);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
        curl_setopt($ch, CURLOPT_USERPWD, self::USER . ":" . self::PASS);
        $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $result = curl_exec($ch);
        curl_close($ch);

        $down = new Downloader($this->getSyncUploadDirectory(), $this->getFile(), $result);
        $down->saveToFile();
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

        $this->addRecordCounter($record_id, $all, $suc, self::MIXTURE_DEV_ID);
        $this->addMessage("Přečteno záznamů : <b>" . $all . "</b>");
        $this->addMessage("Zpracováno záznamů : <b>" . $suc . "</b>");
    }

}
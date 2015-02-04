<?php namespace Authority\Runner\Task\Store;

use Authority\Eloquent\RecordSyncImport;
use Authority\Runner\Task\TaskMessage;

class SyncMadalbal extends TaskMessage implements iSync
{
	const DEV_NAME = 'madalbal';

	public function __construct($table_cron)
	{
		parent::__construct($table_cron);
		$this->curl = new MyuCurl('http://shop.madalbal.cz/katalog/feeds/products.xml');
		$this->curl->setName("27634493/0");
		$this->curl->setPass("NAD276ph");
		$this->curl->useAuth(true);
		$this->curl->createCurl();
		$this->remotelyPrepareSynchronize();
		$this->runSynchronizeData();
	}

	public function remotelyPrepareSynchronize()
	{
		$down = new Downloader($this->getSyncUploadDirectory(), $this->getFile(), $this->curl->__tostring());
		$down->runDownload(false);
		$down->unzipDownload();
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
		$xml = (array)simplexml_load_file($this->getSyncUploadDirectory() .  $this->getFile());
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

					if ($run->isUseRequired() === true) {
						$suc++;
						$run->insertData2Db();
					}
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
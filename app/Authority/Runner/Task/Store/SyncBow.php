<?php namespace Authority\Runner\Task\Store;

use Authority\Eloquent\RecordSyncImport;
use Authority\Runner\Task\TaskMessage;

class SyncBow extends TaskMessage implements iSync
{
	const DEV_NAME = 'bow';

	public function __construct($table_cron)
	{
		parent::__construct($table_cron);
		$this->remotelyPrepareSynchronize();
		$this->runSynchronizeData();
	}

	public function remotelyPrepareSynchronize()
	{
		$down = new Downloader($this->getSyncUploadDirectory(), $this->getFile(), 'http://www.bow.cz/sellersXML/xmlfeed.zip');
		$down->runDownload();
		$down->unzipDownload();
	}

	public function getSyncUploadDirectory()
	{
		return __DIR__ . "/data/";
	}

	public function getFile()
	{
		return self::DEV_NAME . "-" . date('Y-m') . ".zip";
	}

	public function runSynchronizeData()
	{
		$all = $suc = 0;
		$xml = simplexml_load_file($this->getSyncUploadDirectory() . "/export.xml", 'SimpleXMLElement', LIBXML_NOCDATA);
		$record_id = strtotime('now');

		RecordSyncImport::create([
			'id'         => $record_id,
			'purpose'    => 'autosync',
			'name'       => __CLASS__,
			'created_at' => date("Y-m-d H:i:s", $record_id)
		]);

		foreach ($xml->SHOP as $row) {
			foreach ($row as $item) {

				$all++;
				$arr_item = array_filter((array)$item);
				$run = new RunBow($arr_item, $record_id);

				if ($run->isUseRequired() === true) {
					$suc++;
					$run->insertData2Db();
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
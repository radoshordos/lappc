<?php namespace Authority\Runner\Task\Store;

use Authority\Eloquent\RecordSyncImport;
use Authority\Runner\Task\TaskMessage;

class SyncProma extends TaskMessage implements iSync
{
	const DEV_NAME = 'proma';
	protected $curl;

	public function __construct($table_cron)
	{
		parent::__construct($table_cron);
		$this->remotelyPrepareSynchronize();
		$this->runSynchronizeData();
	}

	public function remotelyPrepareSynchronize()
	{
		$down1 = new Downloader(__DIR__ . "/data/", $this->getFile(), 'http://b2b.satrade.cz/pl.php?u=83887-64-63');
		$down1->runDownload();
	}

	public function getFile()
	{
		return self::DEV_NAME . "-" . date('Y-m') . ".xml";
	}

	function runSynchronizeData()
	{
		$all = $suc = 0;
		$xml = simplexml_load_file(__DIR__ . "/data/" . $this->getFile());
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

			if ($run->isUseRequired() === true) {
				$suc++;
				$run->insertData2Db($this->db);
			}
		}

		$rsi = RecordSyncImport::find($record_id);
		$rsi->item_counter = $suc;
		$rsi->save();

		$this->addMessage("Přečteno záznamů : <b>" . $all . "</b>");
		$this->addMessage("Zpracováno záznamů : <b>" . $suc . "</b>");
	}

	public function getSyncUploadDirectory()
	{
		return __DIR__ . "/data/";
	}
}
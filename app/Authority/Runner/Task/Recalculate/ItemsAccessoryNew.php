<?php namespace Authority\Runner\Task\Recalculate;

use Authority\Eloquent\ProdAccessory;
use Authority\Eloquent\SyncDbAccessory;
use Authority\Runner\Task\iRun;
use Authority\Runner\Task\TaskMessage;

class ProdAccessoryNew extends TaskMessage implements iRun
{

	public function __construct($db)
	{
		parent::__construct($db);
		$this->run();
	}

	public function run()
	{
		$sda = SyncDbAccessory::select(['sync_db.item_id', 'sync_db.dev_id', 'sync_db_accessory.connection', 'item.id'])
			->join('sync_db', 'sync_db_accessory.sync_id', '=', 'sync_db.id')
			->join('items', 'sync_db_accessory.connection', '=', 'items.code_prod')
			->whereNotNull('item_id')
			->get();

		if (!empty($sda)) {
			foreach ($sda as $val) {
				ProdAccessory::create(['purpose' => 'cronacc', 'prod_from_id' => $val->item_id, 'prod_to_id' => $val->id]);
			}
		}
	}
}
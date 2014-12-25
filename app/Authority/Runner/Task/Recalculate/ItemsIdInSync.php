<?php namespace Authority\Runner\Task\Recalculate;

use Authority\Eloquent\Items;
use Authority\Eloquent\SyncDb;
use Authority\Runner\Task\iRun;
use Authority\Runner\Task\TaskMessage;

class ItemsIdInSync extends TaskMessage implements iRun
{

	public function __construct($db)
	{
		parent::__construct($db);
		$this->run();
	}

	public function run()
	{
		$i = 0;
		$distinct_dev = SyncDb::distinct()->get(["dev_id"]);

		if ($distinct_dev->count() > 0) {
			foreach ($distinct_dev as $val) {

				$row = Items::join('prod', 'items.prod_id', '=', 'prod.id')
					->join('sync_db', 'sync_db.code_prod', '=', 'items.code_prod')
					->whereNotNull('items.code_prod')
					->whereNull('sync_db.item_id')
					->where('prod.dev_id', '=', $val->dev_id)->get([
						'items.id AS items_id',
						'sync_db.id AS sync_db_id'
					]);

				if (count($row) > 0) {
					foreach ($row as $value) {
						$i++;
						$sdb = SyncDb::find($value->sync_db_id);
						$sdb->item_id = $value->items_id;
						$sdb->save();
					}
				}
			}
		}

		$this->addMessage("Propojeno pomocí ID s položkama : <b>" . $i . "</b>");
	}
}
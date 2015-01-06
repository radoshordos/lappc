<?php namespace Authority\Runner\Task\Fix;

use Authority\Eloquent\Items;
use Authority\Eloquent\SyncDb;
use Authority\Runner\Task\iRun;
use Authority\Runner\Task\TaskMessage;

class AddEanFromSync extends TaskMessage implements iRun
{
	public function __construct($db)
	{
		parent::__construct($db);
		$this->run();
	}

	public function run()
	{
		$count = 0;
		$sdb = SyncDb::select(['items.id', 'sync_db.code_ean'])
			->join('items', 'sync_db.item_id', '=', 'items.id')
			->whereNotNull('sync_db.item_id')
			->whereNotNull('sync_db.code_ean')
			->whereNull('items.code_ean')
			->whereIn('purpose', ['manualsync', 'autosync'])
			->get();

		if (!empty($sdb)) {
			foreach ($sdb as $val) {
				$count++;
				$items = Items::find($val->id);
				$items->code_ean = $val->code_ean;
				$items->save();
			}
		}
		$this->addMessage("Zapsáno EAN kódů ze synchronizace: <b>" . $count . "</b>");
	}
}
<?php

use \Authority\Eloquent\SyncDb;

class SyncSummaryController extends \BaseController
{
	public function index()
	{
		return View::make('adm.sync.summary.index', [
			'summary' => SyncDb::selectRaw(
					'dev.id as dev_id,
					 dev.name as dev_name,
					(SELECT COUNT(*) FROM sync_db WHERE sync_db.item_id IS NOT NULL AND sync_db.dev_id = dev.id AND sync_db.purpose = "manualsync" OR sync_db.purpose = "autosync") AS count_insert_prod,
					(SELECT COUNT(*) FROM sync_db WHERE sync_db.dev_id = dev.id AND sync_db.purpose = "manualsync" OR sync_db.purpose = "autosync") AS count_items_dev'
				)
				->join('dev', 'sync_db.dev_id', '=', 'dev.id')
				->groupBy('sync_db.dev_id')
				->get()
		]);
	}
}
<?php

use \Authority\Eloquent\SyncDb;

class SyncSummaryController extends \BaseController
{
	public function index()
	{
		$i = 0;
		$arr = [];
		$sdb = SyncDb::distinct()->select(['sync_db.dev_id', 'dev.name'])->join('dev', 'dev.id', '=', 'sync_db.dev_id')->where('purpose', '=', Input::get('dfilter'))->get();

		if (!empty($sdb)) {
			foreach ($sdb as $row) {

				$count_insert_prod = SyncDb::where('purpose', '=', Input::get('dfilter'))->where('dev_id', '=', $row->dev_id)->whereNotNull('sync_db.item_id')->count();
				$count_items_dev = SyncDb::where('purpose', '=', Input::get('dfilter'))->where('dev_id', '=', $row->dev_id)->count();
				$arr[$i++] = array_merge($row->toArray(), ['count_insert_prod' => $count_insert_prod], ['count_items_dev' => $count_items_dev]);
			}
		}



		return View::make('adm.sync.summary.index', [
			'dfilter' => Input::get('dfilter'),
			'summary' => !empty($arr) ? $arr : NULL
		]);
	}
}
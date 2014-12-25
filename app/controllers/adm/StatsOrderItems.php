<?php

use Authority\Eloquent\BuyOrderDbItems;
use Authority\Tools\SB;

class StatsOrderItems extends \BaseController
{
	public function index()
	{
/*
		$sum_prod = $db->fetchAll($db->select()->from("log2prod2booking", ["count_prod" => "COUNT(*)"])
			->joinLeft("items", Model_Zendb::ZEND_LOG2PROD2BOOKING_2_ITEMS, [])
			->joinLeft("prod", Model_Zendb::ZEND_ITEMS_2_PROD, ["prod_name"])
			->where("lpb_ti_create >= ?", strtotime($_GET["day-start"]))
			->where("lpb_ti_create <= ?", strtotime($_GET["day-end"]))
			->where((intval($_GET["dev_id"]) > 0) ? $db->quoteInto("prod_id_dev = ?", intval($_GET['dev_id'])) : "1=1")
			->group(["lpb_id_prod"])
			->order(["count_prod DESC", "prod_name ASC"])
		);
		*/

		return View::make('adm.stats.orderitems.index', [
			'min_insert_month'   => BuyOrderDbItems::selectRaw('DATE_FORMAT(FROM_UNIXTIME(MIN("created_at")), "%e %b %Y") AS min_insert_month')->pluck('created_at'),
			'max_insert_month'   => BuyOrderDbItems::selectRaw('DATE_FORMAT(FROM_UNIXTIME(MAX("created_at")), "%e %b %Y") AS max_insert_month')->pluck('created_at'),
			'select_mixture_dev' => SB::option("SELECT * FROM mixture_dev ORDER BY name,id", ['id' => '->name - [Výrobců &#8721;:->trigger_column_count]'], true),
			'choice_mixture_dev' => Input::get('select_mixture_dev')
		]);
	}
}
<?php

use Authority\Eloquent\Items;
use Authority\Eloquent\RecordItemsPurchased;


class NakupniKosikController extends Controller
{

	public function index()
	{
		return "NAKUP index";
	}


	public function store()
	{
		if (Input::has('do-kosiku') && is_array(Input::get('do-kosiku')) === true) {

			$sid = Session::getId();
			foreach (array_keys(Input::get('do-kosiku')) as $key) {

				$items = Items::find($key);
				if (!empty($items) && !empty($sid)) {

					RecordItemsPurchased::create([
						'sid' => $sid,
						'item_id' => $items->id,
						'item_count' => 1,
						'item_price' => 1,
						'prod_forex_id' => $items->prod->forex_id,
						'prod_mode_id' => $items->prod->mode_id,
					]);





				}
			}
			return "NAKUP store";
		}
	}
}
<?php

use Authority\Eloquent\Items;
use Authority\Eloquent\RecordInputSell;


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

					RecordInputSell::create([
						'sid' => $sid,
						'items_id' => $items->id,
						'items_count' => 1,
						'prod_mode_id' => $items->prod->mode_id,
						'price_sell' => 6666
					]);

				}
			}
			return "NAKUP store";
		}
	}
}
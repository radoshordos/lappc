<?php

use Authority\Eloquent\Items;
use Authority\Eloquent\RecordItemsPurchased;

class KosikController extends Controller
{
	private $sid;

	public function __construct()
	{
		$this->sid = Session::getId();
	}

	public function index()
	{
		if (Input::has('delete-buy-item')) {
			$rip = RecordItemsPurchased::find(Input::get('delete-buy-item'));
			if ($rip->sid === $this->sid) {
				RecordItemsPurchased::destroy(Input::get('delete-buy-item'));
			}
		}

		return View::make('web.kosik', [
			'record_items_purchased' => RecordItemsPurchased::where('sid', '=', $this->sid)->get(),
			'term'                   => Input::get('term')
		]);
	}

	public function store()
	{

		if (Input::has('do-kosiku') && is_array(Input::get('do-kosiku')) === true) {

			$sid = Session::getId();
			foreach (array_keys(Input::get('do-kosiku')) as $key) {

				$items = Items::find($key);
				if (!empty($items) && !empty($sid)) {

					$count = RecordItemsPurchased::where('sid', '=', $this->sid)->where('item_id', '=', $items->id)->count();
					if (intval($count) < 1) {

						RecordItemsPurchased::create([
							'sid'           => $this->sid,
							'item_id'       => $items->id,
							'item_count'    => 1,
							'item_price'    => 1,
							'prod_id'       => $items->prod->id,
							'prod_forex_id' => $items->prod->forex_id,
							'prod_mode_id'  => $items->prod->mode_id,
						]);
					}
				}
			}
		}
		return Redirect::action('KosikController@index');
	}

	/*
		public function delete($id) {
			var_dump($id);

			die;

			return Redirect::action('KosikController@index');
		}
	*/
}
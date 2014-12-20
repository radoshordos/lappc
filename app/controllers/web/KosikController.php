<?php

use Authority\Eloquent\Items;
use Authority\Eloquent\RecordItemsPurchased;
use Authority\Eloquent\BuyOrderDbCustomer;

class KosikController extends Controller
{
	CONST SIFRA = '123';
	private $sid;

	public function __construct()
	{
		$this->sid = Session::getId();
	}

	public function index()
	{
		if (Input::has('delete-buy-item')) {
			$rip = RecordItemsPurchased::find(Input::get('delete-buy-item'));
			if (!empty($rip) && $rip->sid === $this->sid) {
				RecordItemsPurchased::destroy(Input::get('delete-buy-item'));
			}
		}

		return View::make('web.kosik', [
			'sid'                    => $this->sid,
			'customer'               => BuyOrderDbCustomer::where('sid', '=', $this->sid)->first(),
			'record_items_purchased' => RecordItemsPurchased::where('sid', '=', $this->sid)->get(),
			'term'                   => Input::get('term')
		]);
	}

	public function store()
	{

		if (Input::has('kup-si-me')) {

			$bodc = BuyOrderDbCustomer::where('sid', '=', $this->sid)->first();
			if (empty($bodc)) {
				BuyOrderDbCustomer::create([
					'sid'                => $this->sid,
					'customer_fullname'  => Db::raw("AES_ENCRYPT('" . base64_encode(bzcompress(Input::get('fullname'))) . "','" . self::SIFRA . "')"),
					'customer_phone'     => Db::raw("AES_ENCRYPT('" . base64_encode(bzcompress(Input::get('phone'))) . "','" . self::SIFRA . "')"),
					'customer_email'     => Db::raw("AES_ENCRYPT('" . base64_encode(bzcompress(Input::get('email'))) . "','" . self::SIFRA . "')"),
					'customer_street'    => Db::raw("AES_ENCRYPT('" . base64_encode(bzcompress(Input::get('street'))) . "','" . self::SIFRA . "')"),
					'customer_city'      => Db::raw("AES_ENCRYPT('" . base64_encode(bzcompress(Input::get('city'))) . "','" . self::SIFRA . "')"),
					'customer_post_code' => Db::raw("AES_ENCRYPT('" . base64_encode(bzcompress(Input::get('postcode'))) . "','" . self::SIFRA . "')")
				]);
			}
		}

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
}
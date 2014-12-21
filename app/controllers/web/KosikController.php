<?php

use Authority\Eloquent\Items;
use Authority\Eloquent\BuyOrderDbItems;
use Authority\Eloquent\BuyOrderDbCustomer;

class KosikController extends Controller
{
	CONST SIFRA = 'VeRY_STRoN1G_SeECREET_PAS3WoRD:-]';
	private $sid;

	public function __construct()
	{
		$this->sid = Session::getId();
	}

	public function index()
	{
		if (Input::has('delete-buy-item')) {
			$bodi = BuyOrderDbItems::find(Input::get('delete-buy-item'));
			if (!empty($bodi) && $bodi->sid === $this->sid) {
				RecordItemsPurchased::destroy(Input::get('delete-buy-item'));
			}
		}

		return View::make('web.kosik', [
			'sid'                    => $this->sid,
			'customer'               => BuyOrderDbCustomer::selectRaw(
				implode(',', [
					"AES_DECRYPT(customer_fullname,'" . self::SIFRA . "') AS fullname",
					"AES_DECRYPT(customer_phone,'" . self::SIFRA . "') AS phone",
					"AES_DECRYPT(customer_email,'" . self::SIFRA . "') AS email",
					"AES_DECRYPT(customer_street,'" . self::SIFRA . "') AS street",
					"AES_DECRYPT(customer_city,'" . self::SIFRA . "') AS city",
					"AES_DECRYPT(customer_post_code,'" . self::SIFRA . "') AS postcode"
				]))->where('sid', '=', $this->sid)->first(),
			'record_items_purchased' => BuyOrderDbItems::where('sid', '=', $this->sid)->get(),
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
					'customer_fullname'  => \DB::raw("AES_ENCRYPT('" . Input::get('fullname') . "','" . self::SIFRA . "')"),
					'customer_phone'     => \DB::raw("AES_ENCRYPT('" . Input::get('phone') . "','" . self::SIFRA . "')"),
					'customer_email'     => \DB::raw("AES_ENCRYPT('" . Input::get('email') . "','" . self::SIFRA . "')"),
					'customer_street'    => \DB::raw("AES_ENCRYPT('" . Input::get('street') . "','" . self::SIFRA . "')"),
					'customer_city'      => \DB::raw("AES_ENCRYPT('" . Input::get('city') . "','" . self::SIFRA . "')"),
					'customer_post_code' => \DB::raw("AES_ENCRYPT('" . Input::get('postcode') . "','" . self::SIFRA . "')")
				]);
			}
		}


		if (Input::has('do-kosiku') && is_array(Input::get('do-kosiku')) === true) {

			$sid = Session::getId();
			foreach (array_keys(Input::get('do-kosiku')) as $key) {

				$items = Items::find($key);
				if (!empty($items) && !empty($sid)) {

					$count = BuyOrderDbItems::where('sid', '=', $this->sid)->where('item_id', '=', $items->id)->count();
					if (intval($count) < 1) {

						BuyOrderDbItems::create([
							'sid'           => $this->sid,
							'item_id'       => $items->id,
							'item_count'    => 1,
							'item_price'    => 1,
							'prod_forex_id' => $items->prod->forex_id,
							'prod_mode_id'  => $items->prod->mode_id,
							'prod_fullname' => $items->prod->prod_name,
						]);
					}
				}
			}
		}
		return Redirect::action('KosikController@index');
	}
}
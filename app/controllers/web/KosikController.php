<?php

use Authority\Eloquent\Items;
use Authority\Eloquent\BuyOrderDb;
use Authority\Eloquent\BuyOrderDbItems;
use Authority\Eloquent\BuyOrderDbCustomer;
use Authority\Eloquent\ViewTree;

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
				BuyOrderDbItems::destroy(Input::get('delete-buy-item'));
			}
		}

		$view_tree_actual = ViewTree::where('tree_group_type', '=', 'buybox')->first();

		if (Input::get('krok') == 'zadani-kontaktnich-udaju') {

			return View::make('web.kosik_krok2', [
				'sid'                => $this->sid,
				'term'               => Input::get('term'),
				'cena_celkem'        => 0, // Zero OK
				'buy_order_db_items' => BuyOrderDbItems::where('sid', '=', $this->sid)->get(),
				'view_tree_actual'   => $view_tree_actual,
				'weight_sum'         => BuyOrderDbItems::selectRaw('(SELECT SUM(buy_order_db_items.item_count * prod.transport_weight)) AS weight_sum')
					->join('items', 'buy_order_db_items.item_id', '=', 'items.id')
					->join('prod', 'items.prod_id', '=', 'prod.id')
					->where('sid', '=', $this->sid)
					->pluck('weight_sum'),
				'customer'           => BuyOrderDbCustomer::selectRaw(
					implode(',', [
						"AES_DECRYPT(customer_fullname,'" . self::SIFRA . "') AS fullname",
						"AES_DECRYPT(customer_phone,'" . self::SIFRA . "') AS phone",
						"AES_DECRYPT(customer_email,'" . self::SIFRA . "') AS email",
						"AES_DECRYPT(customer_street,'" . self::SIFRA . "') AS street",
						"AES_DECRYPT(customer_city,'" . self::SIFRA . "') AS city",
						"AES_DECRYPT(customer_post_code,'" . self::SIFRA . "') AS postcode"
					]))->where('sid', '=', $this->sid)->first(),
			]);
		}

		if (Input::get('krok') == 'dokonceni-objednavky') {

			Session::regenerateToken();

			return View::make('web.kosik_complete', [
				'term' => Input::get('term')
			]);
		}

		return View::make('web.kosik_krok1', [
			'sid'                => $this->sid,
			'buy_order_db_items' => BuyOrderDbItems::where('sid', '=', $this->sid)->get(),
			'item_new'           => BuyOrderDbItems::where('sid', '=', $this->sid)->orderBy('created_at', 'DESC')->first(),
			'view_tree_actual'   => $view_tree_actual,
			'term'               => Input::get('term'),
			'cena_celkem'        => 0, // Zero OK
			'weight_sum'         => BuyOrderDbItems::selectRaw('(SELECT SUM(buy_order_db_items.item_count * prod.transport_weight)) AS weight_sum')
				->join('items', 'buy_order_db_items.item_id', '=', 'items.id')
				->join('prod', 'items.prod_id', '=', 'prod.id')
				->where('sid', '=', $this->sid)
				->pluck('weight_sum')
		]);
	}

	public function kontakt()
	{
		var_dump(Input::all());
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
					'customer_post_code' => \DB::raw("AES_ENCRYPT('" . Input::get('postcode') . "','" . self::SIFRA . "')"),
					'customer_state'     => \DB::raw("AES_ENCRYPT('" . Input::get('state') . "','" . self::SIFRA . "')"),
					'customer_company'   => \DB::raw("AES_ENCRYPT('" . Input::get('company') . "','" . self::SIFRA . "')"),
					'customer_ic'        => \DB::raw("AES_ENCRYPT('" . Input::get('ic') . "','" . self::SIFRA . "')"),
					'customer_dic'       => \DB::raw("AES_ENCRYPT('" . Input::get('dic') . "','" . self::SIFRA . "')"),
					'delivery_fullname'  => \DB::raw("AES_ENCRYPT('" . Input::get('delivery_fullname') . "','" . self::SIFRA . "')"),
					'delivery_street'    => \DB::raw("AES_ENCRYPT('" . Input::get('delivery_street') . "','" . self::SIFRA . "')"),
					'delivery_city'      => \DB::raw("AES_ENCRYPT('" . Input::get('delivery_city') . "','" . self::SIFRA . "')"),
					'delivery_post_code' => \DB::raw("AES_ENCRYPT('" . Input::get('delivery_post_code') . "','" . self::SIFRA . "')"),
					'delivery_state'     => \DB::raw("AES_ENCRYPT('" . Input::get('delivery_state') . "','" . self::SIFRA . "')"),
					'delivery_company'   => \DB::raw("AES_ENCRYPT('" . Input::get('delivery_company') . "','" . self::SIFRA . "')"),
					'note'               => \DB::raw("AES_ENCRYPT('" . Input::get('note') . "','" . self::SIFRA . "')")
				]);
			}

			$arh = apache_request_headers();

			BuyOrderDb::create([
				'sid'         => $this->sid,
				"remote_addr" => Request::getClientIp(),
				"netbios"     => gethostbyaddr(Request::getClientIp()),
				"browser"     => substr(strip_tags($arh["User-Agent"]), 0, 510),
			]);

			return Redirect::action('KosikController@index', ['krok' => 'dokonceni-objednavky']);
		}

		if (Input::has('do-kosiku') && is_array(Input::get('do-kosiku')) === true) {

			foreach (array_keys(Input::get('do-kosiku')) as $key) {

				$items = Items::find($key);
				if (!empty($items) && !empty($this->sid)) {

					$count = BuyOrderDbItems::where('sid', '=', $this->sid)->where('item_id', '=', $items->id)->count();
					if (intval($count) < 1) {

						BuyOrderDbItems::create([
							'sid'           => $this->sid,
							'item_id'       => $items->id,
							'item_count'    => 1,
							'item_price'    => 1,
							'prod_forex_id' => $items->prod->forex_id,
							'prod_mode_id'  => $items->prod->mode_id,
							'prod_fullname' => $items->prod->name,
						]);
					}
				}
			}
		}

		if (Input::has('zadej-kontakt')) {
			if (!empty(Input::get('item_count'))) {
				foreach (Input::get('item_count') as $key => $val) {
					$item = BuyOrderDbItems::where('id', '=', $key)->where('sid', '=', $this->sid)->first();
					$item->item_count = intval($val);
					$item->save();
				}
			}
			return Redirect::action('KosikController@index', ['krok' => 'zadani-kontaktnich-udaju']);
		}

		return Redirect::action('KosikController@index');
	}
}
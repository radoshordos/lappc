<?php

use Authority\Eloquent\Items;
use Authority\Eloquent\BuyOrderDb;
use Authority\Eloquent\BuyOrderDbItems;
use Authority\Eloquent\BuyOrderDbCustomer;
use Authority\Eloquent\BuyTransport;
use Authority\Eloquent\BuyPayment;
use Authority\Eloquent\ViewTree;

class KosikController extends Controller
{
	CONST SIFRA = 'VeRY_STRoN1G_SeECREET_PAS3WoRD:-]';
	CONST KOSIKSPACE = 'kosik';

	private $sid;
	private $term;

	public function __construct()
	{
		$this->sid = Session::getId();
		$this->term = Input::get('term');
	}

	protected function buyBoxPrice()
	{
		return BuyOrderDbItems::selectRaw('(SELECT ROUND(SUM(buy_order_db_items.item_count * buy_order_db_items.item_price))) AS buy_box_price')
			->where('sid', '=', $this->sid)
			->pluck('buy_box_price');
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
				'namespace'          => self::KOSIKSPACE,
				'krok'               => 2,
				'sid'                => $this->sid,
				'buy_box_price'      => $this->buyBoxPrice(),
				'term'               => $this->term,
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
						"delivery_id",
						"payment_id",
						"AES_DECRYPT(customer_fullname,'" . self::SIFRA . "') AS c_fullname",
						"AES_DECRYPT(customer_phone,'" . self::SIFRA . "') AS c_phone",
						"AES_DECRYPT(customer_email,'" . self::SIFRA . "') AS c_email",
						"AES_DECRYPT(customer_street,'" . self::SIFRA . "') AS c_street",
						"AES_DECRYPT(customer_city,'" . self::SIFRA . "') AS c_city",
						"AES_DECRYPT(customer_post_code,'" . self::SIFRA . "') AS c_post_code",
						"AES_DECRYPT(customer_state,'" . self::SIFRA . "') AS c_state",
						"AES_DECRYPT(customer_company,'" . self::SIFRA . "') AS c_company",
						"AES_DECRYPT(customer_ic,'" . self::SIFRA . "') AS c_ic",
						"AES_DECRYPT(customer_dic,'" . self::SIFRA . "') AS c_dic",
						"AES_DECRYPT(delivery_fullname,'" . self::SIFRA . "') AS d_fullname",
						"AES_DECRYPT(delivery_street,'" . self::SIFRA . "') AS d_street",
						"AES_DECRYPT(delivery_city,'" . self::SIFRA . "') AS d_city",
						"AES_DECRYPT(delivery_post_code,'" . self::SIFRA . "') AS d_post_code",
						"AES_DECRYPT(delivery_state,'" . self::SIFRA . "') AS d_state",
						"AES_DECRYPT(delivery_company,'" . self::SIFRA . "') AS d_company",
						"AES_DECRYPT(note,'" . self::SIFRA . "') AS note"
					]))->where('sid', '=', $this->sid)->first(),
			]);
		}

		if (Input::get('krok') == 'souhrn-objednavky') {
			return View::make('web.kosik_krok3', [
				'namespace'          => self::KOSIKSPACE,
				'krok'               => 3,
				'sid'                => $this->sid,
				'buy_box_price'      => $this->buyBoxPrice(),
				'term'               => $this->term,
				'cena_celkem'        => 0, // Zero OK,
				'buy_order_db_items' => BuyOrderDbItems::where('sid', '=', $this->sid)->get(),
				'weight_sum'         => BuyOrderDbItems::selectRaw('(SELECT SUM(buy_order_db_items.item_count * prod.transport_weight)) AS weight_sum')
					->join('items', 'buy_order_db_items.item_id', '=', 'items.id')
					->join('prod', 'items.prod_id', '=', 'prod.id')
					->where('sid', '=', $this->sid)
					->pluck('weight_sum'),
				'customer'           => BuyOrderDbCustomer::selectRaw(
					implode(',', [
						"delivery_id",
						"payment_id",
						"AES_DECRYPT(customer_fullname,'" . self::SIFRA . "') AS c_fullname",
						"AES_DECRYPT(customer_street,'" . self::SIFRA . "') AS c_street",
						"AES_DECRYPT(customer_city,'" . self::SIFRA . "') AS c_city",
						"AES_DECRYPT(customer_post_code,'" . self::SIFRA . "') AS c_post_code",
						"AES_DECRYPT(customer_phone,'" . self::SIFRA . "') AS c_phone",
						"AES_DECRYPT(customer_email,'" . self::SIFRA . "') AS c_email",
						"AES_DECRYPT(customer_company,'" . self::SIFRA . "') AS c_company",
						"AES_DECRYPT(customer_ic,'" . self::SIFRA . "') AS c_ic",
						"AES_DECRYPT(customer_dic,'" . self::SIFRA . "') AS c_dic",
						"AES_DECRYPT(delivery_fullname,'" . self::SIFRA . "') AS d_fullname",
						"AES_DECRYPT(delivery_street,'" . self::SIFRA . "') AS d_street",
						"AES_DECRYPT(delivery_city,'" . self::SIFRA . "') AS d_city",
						"AES_DECRYPT(delivery_post_code,'" . self::SIFRA . "') AS d_post_code",
						"AES_DECRYPT(delivery_state,'" . self::SIFRA . "') AS d_state",
						"AES_DECRYPT(delivery_company,'" . self::SIFRA . "') AS d_company",
						"AES_DECRYPT(note,'" . self::SIFRA . "') AS note"
					]))->where('sid', '=', $this->sid)->first()
			]);
		}

		if (Input::get('krok') == 'dokonceni-objednavky') {

			Session::regenerateToken();
			Session::regenerate(TRUE);

			return View::make('web.kosik_complete', [
				'namespace'     => self::KOSIKSPACE,
				'buy_box_price' => $this->buyBoxPrice(),
				'term'          => $this->term
			]);
		}

		$weight_sum = BuyOrderDbItems::selectRaw('(SELECT SUM(buy_order_db_items.item_count * prod.transport_weight)) AS weight_sum')
			->join('items', 'buy_order_db_items.item_id', '=', 'items.id')
			->join('prod', 'items.prod_id', '=', 'prod.id')
			->where('sid', '=', $this->sid)
			->pluck('weight_sum');

		return View::make('web.kosik_krok1', [
			'namespace'          => self::KOSIKSPACE,
			'krok'               => 1,
			'sid'                => $this->sid,
			'buy_box_price'      => $this->buyBoxPrice(),
			'buy_order_db_items' => BuyOrderDbItems::where('sid', '=', $this->sid)->get(),
			'item_new'           => BuyOrderDbItems::where('sid', '=', $this->sid)->orderBy('created_at', 'DESC')->first(),
			'buy_transport'      => BuyTransport::where('active', '=', 1)->where('weight_start', '<', $weight_sum)->where('weight_end', '>=', $weight_sum)->get(),
			'buy_payment'        => BuyPayment::where('active', '=', 1)->get(),
			'view_tree_actual'   => $view_tree_actual,
			'term'               => $this->term,
			'cena_celkem'        => 0, // Zero OK
			'customer'           => BuyOrderDbCustomer::select(["delivery_id", "payment_id"])->where('sid', '=', $this->sid)->first(),
			'weight_sum'         => $weight_sum
		]);
	}

	public function store()
	{
		// KROK 0

		if (Input::has('do-kosiku') && is_array(Input::get('do-kosiku')) === TRUE) {

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

		// KROK 1

		if (Input::has('zadej-kontakt')) {

			if (!empty(Input::get('item_count'))) {
				foreach (Input::get('item_count') as $key => $val) {
					$item = BuyOrderDbItems::where('id', '=', $key)->where('sid', '=', $this->sid)->first();
					$item->item_count = intval($val);
					$item->save();
				}
			}

			$bodc = BuyOrderDbCustomer::where('sid', '=', $this->sid)->first();
			if (intval(Input::get('delivery_id')) == 0 || intval(Input::get('payment_id')) == 0) {
				return Redirect::action('KosikController@index');
			} elseif (empty($bodc)) {
				BuyOrderDbCustomer::create([
					'sid'         => $this->sid,
					'delivery_id' => intval(Input::get('delivery_id')),
					'payment_id'  => intval(Input::get('payment_id')),
				]);
			} else {
				$bodc->delivery_id = intval(Input::get('delivery_id'));
				$bodc->payment_id = intval(Input::get('payment_id'));
				$bodc->save();
			}
			return Redirect::action('KosikController@index', ['krok' => 'zadani-kontaktnich-udaju']);
		}

		// KROK 2

		if (Input::has('zkontroluj-si-me')) {

			$bodc = BuyOrderDbCustomer::where('sid', '=', $this->sid)->first();

			if (empty($bodc)) {

				BuyOrderDbCustomer::create([
					'sid'                => $this->sid,
					'customer_fullname'  => \DB::raw("AES_ENCRYPT('" . Input::get('c_fullname') . "','" . self::SIFRA . "')"),
					'customer_phone'     => \DB::raw("AES_ENCRYPT('" . Input::get('c_phone') . "','" . self::SIFRA . "')"),
					'customer_email'     => \DB::raw("AES_ENCRYPT('" . Input::get('c_email') . "','" . self::SIFRA . "')"),
					'customer_street'    => \DB::raw("AES_ENCRYPT('" . Input::get('c_street') . "','" . self::SIFRA . "')"),
					'customer_city'      => \DB::raw("AES_ENCRYPT('" . Input::get('c_city') . "','" . self::SIFRA . "')"),
					'customer_post_code' => \DB::raw("AES_ENCRYPT('" . Input::get('c_post_code') . "','" . self::SIFRA . "')"),
					'customer_state'     => \DB::raw("AES_ENCRYPT('" . Input::get('c_state') . "','" . self::SIFRA . "')"),
					'customer_company'   => \DB::raw("AES_ENCRYPT('" . Input::get('c_company') . "','" . self::SIFRA . "')"),
					'customer_ic'        => \DB::raw("AES_ENCRYPT('" . Input::get('c_ic') . "','" . self::SIFRA . "')"),
					'customer_dic'       => \DB::raw("AES_ENCRYPT('" . Input::get('c_dic') . "','" . self::SIFRA . "')"),
					'delivery_fullname'  => \DB::raw("AES_ENCRYPT('" . Input::get('d_fullname') . "','" . self::SIFRA . "')"),
					'delivery_street'    => \DB::raw("AES_ENCRYPT('" . Input::get('d_street') . "','" . self::SIFRA . "')"),
					'delivery_city'      => \DB::raw("AES_ENCRYPT('" . Input::get('d_city') . "','" . self::SIFRA . "')"),
					'delivery_post_code' => \DB::raw("AES_ENCRYPT('" . Input::get('d_post_code') . "','" . self::SIFRA . "')"),
					'delivery_state'     => \DB::raw("AES_ENCRYPT('" . Input::get('d_state') . "','" . self::SIFRA . "')"),
					'delivery_company'   => \DB::raw("AES_ENCRYPT('" . Input::get('d_company') . "','" . self::SIFRA . "')"),
					'note'               => \DB::raw("AES_ENCRYPT('" . Input::get('note') . "','" . self::SIFRA . "')")
				]);

			} else {
				$bodc->sid = $this->sid;
				$bodc->customer_fullname = \DB::raw("AES_ENCRYPT('" . Input::get('c_fullname') . "','" . self::SIFRA . "')");
				$bodc->customer_phone = \DB::raw("AES_ENCRYPT('" . Input::get('c_phone') . "','" . self::SIFRA . "')");
				$bodc->customer_email = \DB::raw("AES_ENCRYPT('" . Input::get('c_email') . "','" . self::SIFRA . "')");
				$bodc->customer_street = \DB::raw("AES_ENCRYPT('" . Input::get('c_street') . "','" . self::SIFRA . "')");
				$bodc->customer_city = \DB::raw("AES_ENCRYPT('" . Input::get('c_city') . "','" . self::SIFRA . "')");
				$bodc->customer_post_code = \DB::raw("AES_ENCRYPT('" . Input::get('c_post_code') . "','" . self::SIFRA . "')");
				$bodc->customer_state = \DB::raw("AES_ENCRYPT('" . Input::get('c_state') . "','" . self::SIFRA . "')");
				$bodc->customer_company = \DB::raw("AES_ENCRYPT('" . Input::get('c_company') . "','" . self::SIFRA . "')");
				$bodc->customer_ic = \DB::raw("AES_ENCRYPT('" . Input::get('c_ic') . "','" . self::SIFRA . "')");
				$bodc->customer_dic = \DB::raw("AES_ENCRYPT('" . Input::get('c_dic') . "','" . self::SIFRA . "')");
				$bodc->delivery_fullname = \DB::raw("AES_ENCRYPT('" . Input::get('d_fullname') . "','" . self::SIFRA . "')");
				$bodc->delivery_street = \DB::raw("AES_ENCRYPT('" . Input::get('d_street') . "','" . self::SIFRA . "')");
				$bodc->delivery_city = \DB::raw("AES_ENCRYPT('" . Input::get('d_city') . "','" . self::SIFRA . "')");
				$bodc->delivery_post_code = \DB::raw("AES_ENCRYPT('" . Input::get('d_post_code') . "','" . self::SIFRA . "')");
				$bodc->delivery_state = \DB::raw("AES_ENCRYPT('" . Input::get('d_state') . "','" . self::SIFRA . "')");
				$bodc->delivery_company = \DB::raw("AES_ENCRYPT('" . Input::get('d_company') . "','" . self::SIFRA . "')");
				$bodc->note = \DB::raw("AES_ENCRYPT('" . Input::get('note') . "','" . self::SIFRA . "')");
				$bodc->save();
			}
			return Redirect::action('KosikController@index', ['krok' => 'souhrn-objednavky']);
		}

		// KROK 3

		if (Input::has('kup-si-me')) {

			$products_total_price = BuyOrderDbItems::select([\DB::raw("SUM(item_price * item_count) AS total_price")])->where('sid', '=', $this->sid)->pluck('total_price');

			\DB::beginTransaction();
			$bod = BuyOrderDb::create([
				'sid'                  => $this->sid,
				"remote_addr"          => Request::getClientIp(),
				"netbios"              => gethostbyaddr(Request::getClientIp()),
				"browser"              => (isset($_SERVER['HTTP_USER_AGENT']) ? substr(strip_tags($_SERVER['HTTP_USER_AGENT']), 0, 510) : NULL),
				'products_total_price' => $products_total_price,
				'delivery_price'       => 0
			]);

			$bodc = BuyOrderDbCustomer::where('sid', '=', $this->sid)->first();
			$bodc->order_db_id = $bod->id;
			$bodc->save();
			\DB::commit();

			return Redirect::action('KosikController@index', ['krok' => 'dokonceni-objednavky']);
		}
		return Redirect::action('KosikController@index');
	}
}
<?php

use Authority\Eloquent\BuyOrderDb;
use Authority\Eloquent\BuyOrderDbCustomer;
use Authority\Eloquent\BuyOrderDbItems;
use Authority\Eloquent\BuyPayment;
use Authority\Eloquent\BuyTransport;
use Authority\Eloquent\Items;
use Authority\Eloquent\ViewTree;
use Authority\Eloquent\ViewProd;

class KosikController extends BaseController
{
    CONST SIFRA = 'VeRY_STRoN1G_SeECREET_PAS3WoRD:-]';
    CONST KOSIKSPACE = 'kosik';

    CONST STEP1 = 'nakupni-kosik';
    CONST STEP2 = 'doruceni-a-zpusoby-platby';
    CONST STEP3 = 'kontaktni-informace';
    CONST STEP4 = 'dokonceni-objednavky';

    private $sid;
    private $term;
    private $total_price_products;

    private $view_tree_actual;
    private $buy_order_db_items;
    private $weight_sum;

    public function __construct()
    {
        $this->sid = Session::getId();
        $this->term = Input::get('term');

        if (Input::has('delete-buy-item')) {
            $bodi = BuyOrderDbItems::where('id', '=', intval(Input::get('delete-buy-item')))->where('sid', '=', $this->sid)->first();
            if (!empty($bodi) && $bodi->sid === $this->sid) {
                BuyOrderDbItems::destroy(Input::get('delete-buy-item'));
            }
        }

        $this->weight_sum = $this->getWeightSumProducts();
        $this->total_price_products = $this->getProductsTotalPrice();
        $this->view_tree_actual = ViewTree::where('tree_group_type', '=', 'buybox')->first();
        $this->buy_order_db_items = BuyOrderDbItems::where('sid', '=', $this->sid)->get();
    }

    public function GlobalArray()
    {
        $manipulation = $this->getPaymentTransportArray();

        return [
            'namespace'            => self::KOSIKSPACE,
            'sid'                  => $this->sid,
            'term'                 => $this->term,
            'view_tree_actual'     => $this->view_tree_actual,
            'weight_sum'           => $this->weight_sum,
            'buy_order_db_items'   => $this->buy_order_db_items,
            'buy_payment_name'     => $manipulation['buy_payment_name'],
            'buy_payment_price'    => $manipulation['buy_payment_price'],
            'buy_transport_name'   => $manipulation['buy_transport_name'],
            'buy_transport_price'  => $manipulation['buy_transport_price'],
            'total_price_products' => $this->total_price_products,
            'total_price_order'    => $this->total_price_products + $manipulation['buy_payment_price'] + $manipulation['buy_transport_price']
        ];
    }

    public function __destruct()
    {
        $this->saveHttpRefer();
    }

    public function index()
    {
        if ($this->total_price_products === 0.0) {
            return View::make('web.kosik_krok1', array_merge($this->GlobalArray(), [
                'krok' => 1
            ]));
        } else if (Input::get('krok') === self::STEP2) {
            return View::make('web.kosik_krok2', array_merge($this->GlobalArray(), [
                'krok'          => 2,
                'buy_transport' => BuyTransport::where('active', '=', 1)->where('weight_start', '<', $this->weight_sum)->where('weight_end', '>=', $this->weight_sum)->get(),
                'buy_payment'   => BuyPayment::where('active', '=', 1)->get(),
                'customer'      => BuyOrderDbCustomer::select(["delivery_id", "payment_id"])->where('sid', '=', $this->sid)->first(),
            ]));
        } else if (Input::get('krok') === self::STEP3) {
            return View::make('web.kosik_krok3', array_merge($this->GlobalArray(), [
                'krok'     => 3,
                'customer' => $this->getCustomerArray()
            ]));
        } else if (Input::get('krok') === self::STEP4) {
            Session::regenerateToken();
            Session::regenerate(TRUE);
            return View::make('web.kosik_complete', $this->GlobalArray());
        } else {
            return View::make('web.kosik_krok1', array_merge($this->GlobalArray(), [
                'krok'     => 1,
                'item_new' => BuyOrderDbItems::where('sid', '=', $this->sid)->orderBy('created_at', 'DESC')->first(),
            ]));
        }
    }

    public function store()
    {


        $this->insertToBuy();
        if ($this->total_price_products === 0) {
            return Redirect::action('KosikController@index');
        }

        if (Input::has(self::STEP2)) {



            return $this->step2DeliveryPayment(['krok' => self::STEP2]);
        } else if (Input::has(self::STEP3) && (intval(Input::get('delivery_id')) == 0 || intval(Input::get('payment_id')) == 0)) {
            return $this->step2DeliveryPayment(['krok' => self::STEP2]);
        } else if (Input::has(self::STEP3) && (intval(Input::get('delivery_id')) > 0 && intval(Input::get('payment_id')) > 0)) {
            return $this->step3Contact(['krok' => self::STEP3]);
        } else if (Input::has(self::STEP4)) {
            return $this->step4Complete(['krok' => self::STEP4]);
        } else {
            return Redirect::action('KosikController@index');
        }
    }

    protected function insertToBuy()
    {
        if (Input::has('do-kosiku') && is_array(Input::get('do-kosiku')) === TRUE) {
            foreach (array_keys(Input::get('do-kosiku')) as $key) {
                $items = Items::find($key);
                if (!empty($items) && !empty($this->sid)) {
                    $count = BuyOrderDbItems::where('sid', '=', $this->sid)->where('item_id', '=', $items->id)->count();
                    if (intval($count) < 1) {

                        $view_prod_actual = ViewProd::where('prod_id', '=', $items->prod_id)->first();
                        $vpa = (new \Authority\Mapper\ViewProdMapper)->fetchRow($view_prod_actual);

                        BuyOrderDbItems::create([
                            'sid'           => $this->sid,
                            'item_id'       => $items->id,
                            'item_count'    => 1,
                            'item_price'    => $vpa->getPrice(),
                            'prod_forex'    => $items->prod->forex_id,
                            'prod_mode'     => $items->prod->mode_id,
                            'prod_dev'      => $items->prod->dev_id,
                            'prod_tree'     => $items->prod->tree_id,
                            'prod_fullname' => $vpa->getProdNameWithBonus()
                        ]);
                    }
                }
            }
        }
    }


    protected function step1Buybox()
    {

    }

    protected function step2DeliveryPayment(array $step)
    {
        if (is_array(Input::get('item_count'))) {
            foreach (Input::get('item_count') as $key => $val) {
                $item = BuyOrderDbItems::where('id', '=', $key)->where('sid', '=', $this->sid)->first();
                if (!empty($item)) {
                    $item->item_count = intval($val);
                    $item->save();
                }
            }
        }
        return Redirect::action('KosikController@index', $step);
    }

    protected function step3Contact(array $step)
    {
        $bodc = BuyOrderDbCustomer::where('sid', '=', $this->sid)->first();
        if (empty($bodc)) {
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
        return Redirect::action('KosikController@index', $step);
    }

    protected function step4Complete($step)
    {
        $bodc = BuyOrderDbCustomer::where('sid', '=', $this->sid)->first();
        if (empty($bodc)) {
            BuyOrderDbCustomer::create([
                'sid'                => $this->sid,
                'customer_firstname' => \DB::raw("AES_ENCRYPT('" . Input::get('c_firstname') . "','" . self::SIFRA . "')"),
                'customer_lastname'  => \DB::raw("AES_ENCRYPT('" . Input::get('c_lastname') . "','" . self::SIFRA . "')"),
                'customer_phone'     => \DB::raw("AES_ENCRYPT('" . Input::get('c_phone') . "','" . self::SIFRA . "')"),
                'customer_email'     => \DB::raw("AES_ENCRYPT('" . Input::get('c_email') . "','" . self::SIFRA . "')"),
                'customer_street'    => \DB::raw("AES_ENCRYPT('" . Input::get('c_street') . "','" . self::SIFRA . "')"),
                'customer_city'      => \DB::raw("AES_ENCRYPT('" . Input::get('c_city') . "','" . self::SIFRA . "')"),
                'customer_post_code' => \DB::raw("AES_ENCRYPT('" . Input::get('c_post_code') . "','" . self::SIFRA . "')"),
                'customer_state'     => \DB::raw("AES_ENCRYPT('" . Input::get('c_state') . "','" . self::SIFRA . "')"),
                'firm_company'       => \DB::raw("AES_ENCRYPT('" . Input::get('f_company') . "','" . self::SIFRA . "')"),
                'firm_ico'           => \DB::raw("AES_ENCRYPT('" . Input::get('f_ico') . "','" . self::SIFRA . "')"),
                'firm_dic'           => \DB::raw("AES_ENCRYPT('" . Input::get('f_dic') . "','" . self::SIFRA . "')"),
                'delivery_firstname' => \DB::raw("AES_ENCRYPT('" . Input::get('d_firstname') . "','" . self::SIFRA . "')"),
                'delivery_lastname'  => \DB::raw("AES_ENCRYPT('" . Input::get('d_lastname') . "','" . self::SIFRA . "')"),
                'delivery_street'    => \DB::raw("AES_ENCRYPT('" . Input::get('d_street') . "','" . self::SIFRA . "')"),
                'delivery_city'      => \DB::raw("AES_ENCRYPT('" . Input::get('d_city') . "','" . self::SIFRA . "')"),
                'delivery_post_code' => \DB::raw("AES_ENCRYPT('" . Input::get('d_post_code') . "','" . self::SIFRA . "')"),
                'delivery_state'     => \DB::raw("AES_ENCRYPT('" . Input::get('d_state') . "','" . self::SIFRA . "')"),
                'delivery_company'   => \DB::raw("AES_ENCRYPT('" . Input::get('d_company') . "','" . self::SIFRA . "')"),
                'note'               => \DB::raw("AES_ENCRYPT('" . Input::get('note') . "','" . self::SIFRA . "')")
            ]);
        } else {
            $bodc->sid = $this->sid;
            $bodc->customer_firstname = \DB::raw("AES_ENCRYPT('" . Input::get('c_firstname') . "','" . self::SIFRA . "')");
            $bodc->customer_lastname = \DB::raw("AES_ENCRYPT('" . Input::get('c_lastname') . "','" . self::SIFRA . "')");
            $bodc->customer_phone = \DB::raw("AES_ENCRYPT('" . Input::get('c_phone') . "','" . self::SIFRA . "')");
            $bodc->customer_email = \DB::raw("AES_ENCRYPT('" . Input::get('c_email') . "','" . self::SIFRA . "')");
            $bodc->customer_street = \DB::raw("AES_ENCRYPT('" . Input::get('c_street') . "','" . self::SIFRA . "')");
            $bodc->customer_city = \DB::raw("AES_ENCRYPT('" . Input::get('c_city') . "','" . self::SIFRA . "')");
            $bodc->customer_post_code = \DB::raw("AES_ENCRYPT('" . Input::get('c_post_code') . "','" . self::SIFRA . "')");
            $bodc->customer_state = \DB::raw("AES_ENCRYPT('" . Input::get('c_state') . "','" . self::SIFRA . "')");
            $bodc->firm_company = \DB::raw("AES_ENCRYPT('" . Input::get('f_company') . "','" . self::SIFRA . "')");
            $bodc->firm_ico = \DB::raw("AES_ENCRYPT('" . Input::get('f_ico') . "','" . self::SIFRA . "')");
            $bodc->firm_dic = \DB::raw("AES_ENCRYPT('" . Input::get('f_dic') . "','" . self::SIFRA . "')");
            $bodc->delivery_firstname = \DB::raw("AES_ENCRYPT('" . Input::get('d_firstname') . "','" . self::SIFRA . "')");
            $bodc->delivery_lastname = \DB::raw("AES_ENCRYPT('" . Input::get('d_lastname') . "','" . self::SIFRA . "')");
            $bodc->delivery_street = \DB::raw("AES_ENCRYPT('" . Input::get('d_street') . "','" . self::SIFRA . "')");
            $bodc->delivery_city = \DB::raw("AES_ENCRYPT('" . Input::get('d_city') . "','" . self::SIFRA . "')");
            $bodc->delivery_post_code = \DB::raw("AES_ENCRYPT('" . Input::get('d_post_code') . "','" . self::SIFRA . "')");
            $bodc->delivery_state = \DB::raw("AES_ENCRYPT('" . Input::get('d_state') . "','" . self::SIFRA . "')");
            $bodc->delivery_company = \DB::raw("AES_ENCRYPT('" . Input::get('d_company') . "','" . self::SIFRA . "')");
            $bodc->note = \DB::raw("AES_ENCRYPT('" . Input::get('note') . "','" . self::SIFRA . "')");
            $bodc->save();
        }

        \DB::beginTransaction();
        $bod = BuyOrderDb::create([
            'sid'                  => $this->sid,
            "remote_addr"          => Request::getClientIp(),
            "netbios"              => gethostbyaddr(Request::getClientIp()),
            "http_user_agent"      => isset($_SERVER['HTTP_USER_AGENT']) ? substr($_SERVER['HTTP_USER_AGENT'], 0, 510) : NULL,
            'products_total_price' => $this->total_price_products,
            'delivery_price'       => 0
        ]);

        BuyOrderDbCustomer::where('sid', '=', $this->sid)->update(['order_db_id' => $bod->id]);
        BuyOrderDbItems::where('sid', '=', $this->sid)->update(['order_id' => $bod->id]);
        \DB::commit();

        return Redirect::action('KosikController@index', $step);
    }

    protected function getProductsTotalPrice()
    {
        return doubleval(BuyOrderDbItems::select([\DB::raw("ROUND(SUM(buy_order_db_items.item_price * item_count)) AS total_price_products")])
            ->where('sid', '=', $this->sid)
            ->pluck('total_price_products'));
    }

    protected function getWeightSumProducts()
    {
        return doubleval(BuyOrderDbItems::selectRaw('(SELECT SUM(buy_order_db_items.item_count * prod.transport_weight)) AS weight_sum')
            ->join('items', 'buy_order_db_items.item_id', '=', 'items.id')
            ->join('prod', 'items.prod_id', '=', 'prod.id')
            ->where('sid', '=', $this->sid)
            ->pluck('weight_sum'));
    }

    protected function getPaymentTransportArray()
    {
        $pta = BuyOrderDbCustomer::select([
            'buy_payment.name AS buy_payment_name',
            'buy_payment.price_payment AS buy_payment_price',
            'buy_transport.name AS buy_transport_name',
            'buy_transport.price_transport AS buy_transport_price'])
            ->join('buy_transport', 'buy_order_db_customer.delivery_id', '=', 'buy_transport.id')
            ->join('buy_payment', 'buy_order_db_customer.payment_id', '=', 'buy_payment.id')
            ->where('sid', '=', $this->sid)
            ->first();

        if (!empty($pta)) {
            return $pta->toArray();
        } else {
            return [
                'buy_payment_name'    => "",
                'buy_payment_price'   => 0,
                'buy_transport_name'  => "",
                'buy_transport_price' => 0,
            ];
        }
    }

    protected function getCustomerArray()
    {
        $bodi = BuyOrderDbCustomer::selectRaw(
            implode(',', [
                "delivery_id",
                "payment_id",
                "AES_DECRYPT(customer_firstname,'" . self::SIFRA . "') AS c_firstname",
                "AES_DECRYPT(customer_lastname,'" . self::SIFRA . "') AS c_lastname",
                "AES_DECRYPT(customer_phone,'" . self::SIFRA . "') AS c_phone",
                "AES_DECRYPT(customer_email,'" . self::SIFRA . "') AS c_email",
                "AES_DECRYPT(customer_street,'" . self::SIFRA . "') AS c_street",
                "AES_DECRYPT(customer_city,'" . self::SIFRA . "') AS c_city",
                "AES_DECRYPT(customer_post_code,'" . self::SIFRA . "') AS c_post_code",
                "AES_DECRYPT(customer_state,'" . self::SIFRA . "') AS c_state",
                "AES_DECRYPT(firm_company,'" . self::SIFRA . "') AS f_company",
                "AES_DECRYPT(firm_ico,'" . self::SIFRA . "') AS f_ico",
                "AES_DECRYPT(firm_dic,'" . self::SIFRA . "') AS f_dic",
                "AES_DECRYPT(delivery_firstname,'" . self::SIFRA . "') AS d_firstname",
                "AES_DECRYPT(delivery_lastname,'" . self::SIFRA . "') AS d_lastname",
                "AES_DECRYPT(delivery_street,'" . self::SIFRA . "') AS d_street",
                "AES_DECRYPT(delivery_city,'" . self::SIFRA . "') AS d_city",
                "AES_DECRYPT(delivery_post_code,'" . self::SIFRA . "') AS d_post_code",
                "AES_DECRYPT(delivery_state,'" . self::SIFRA . "') AS d_state",
                "AES_DECRYPT(delivery_company,'" . self::SIFRA . "') AS d_company",
                "AES_DECRYPT(note,'" . self::SIFRA . "') AS note"
            ]))
            ->where('sid', '=', $this->sid)
            ->first();

        return (!empty($bodi)) ? $bodi->toArray() : [];
    }
}
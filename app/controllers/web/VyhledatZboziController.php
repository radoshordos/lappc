<?php

use Authority\Eloquent\ViewProd;
use Authority\Eloquent\ViewTree;
use Authority\Tools\Forex\PriceForex;

class VyhledatZboziController extends EshopController
{
    private $sid;

    public function __construct()
    {
        $this->sid = Session::getId();
    }

    public function index()
    {
        $term = Input::get('term');
        $exp_term = explode(" ", $term);
        $count_term = count($term);


        foreach ($exp_term as $word) {

        }

        $dev_list = ViewProd::select([
            "dev_alias",
            "dev_name",
            "tree_absolute",
            DB::raw("COUNT(prod_id) AS dev_prod_count")
        ])->where('prod_name', 'LIKE', '%' . Input::get('term') . '%')
            ->groupBy(["dev_id"])
            ->get();

        $pagination = ViewProd::where('prod_name', 'LIKE', '%' . Input::get('term') . '%')
            ->where('prod_mode_id', '>', '1')
            ->paginate(18);

        if (!empty($term)) {
            $pagination->appends(['term' => $term]);
        }

        return View::make('web.vyhledavani', [
            'vt_tree'  => ViewTree::first(),
            'vt_list'  => ViewTree::whereIn('tree_group_type', ['prodaction', 'prodlist'])->orderBy('tree_id')->get(),
            'dev_list' => $dev_list,
            'vp'       => $vp = ViewProd::where('prod_name', 'LIKE', '%' . Input::get('term') . '%')->first(),
            'pf'       => new PriceForex,
            'vp_list'  => $pagination,
            'term'     => Input::get('term'),
            'store'    => Input::has('store') ? true : false,
            'action'   => Input::has('action') ? true : false,
        ]);
    }

    public function store()
    {
        return Redirect::action('VyhledatZboziController@index');
    }

    /*
        private function getSelectWhere(Core $core) {

            if ($this->isFindStringLenghEnough() == 1) {

                $cycle = -1;
                $string = explode(" ", $this->getClearFindString());
                $cout_string = count($string);

                if ($cout_string > 0) {

                    foreach ($string as $word) {
                        $cycle++;

                        if (strlen($word) > 8) {
                            $val_cut = substr($word, 0, (intval(strlen($word) - 2)));
                        } else if (strlen($word) > 3) {
                            $val_cut = substr($word, 0, (intval(strlen($word) - 1)));
                        } else {
                            $val_cut = $word;
                        }

                        if (strlen($val_cut) > 6) {
                            $tmp1[$cycle] = $core->db->quoteInto('prod_name LIKE ?', $val_cut . "%");
                        } else if (strlen($val_cut) > 1) {
                            $tmp1[$cycle] = $core->db->quoteInto('prod_name LIKE ?', "%" . $val_cut . "%");
                        } else {
                            $tmp1[$cycle] = $core->db->quoteInto('prod_name LIKE ?', $val_cut);
                        }

                        if (strlen($val_cut) > 0) {
                            $tmp2[$cycle] = $core->db->quoteInto('prod_desc LIKE ?', "%" . $val_cut . "%");
                        }

                        if ($cout_string == 1) {
                            if (strlen($word) == 4) {
                                $tmp3[$cycle] = $core->db->quoteInto('items_code_product LIKE ?', $word) . $core->db->quoteInto(' OR prod_alias_search LIKE ?', "%" . $word);
                            } else if (strlen($word) > 4) {
                                $tmp3[$cycle] = $core->db->quoteInto('items_code_product LIKE ?', "%" . $word) . $core->db->quoteInto(' OR prod_alias_search LIKE ?', "%" . $word . "%");
                            } else {
                                $tmp3[$cycle] = '0 = 1';
                            }
                        }
                    }
                }

                $str = array();
                $str[] = implode(" AND ", $tmp1);
                if (count($tmp2) > 0) {
                    $str[] = implode(" AND ", $tmp2);
                }
                if (count($tmp3) > 0) {
                    $str[] = implode(" AND ", $tmp3);
                }
                return "(" . implode(" OR ", $str) . ")";
            } else {
                return "0=1";
            }
        }

        public function sqlDevSummary(Core $core) {

            return $core->db->fetchAll($core->db->select()->distinct()
                ->from('items', array(''))
                ->joinInner(Inside::LOCAL_TABLE_VIEW_PROD, Inside::LOCAL_TABLE_VIEW_PROD . ".prod_id = items.items_id_prod", array(
                    "dev_unique_string" => "dev_unique_string",
                    "dev_name" => "dev_name",
                    "dev_prod_count" => "COUNT(items_id_prod)"
                ))
                ->where("prod_id_mode >= 1")
                ->where($this->getDbSelectFindWhere())
                ->group(array("dev_id"))
                ->order(array("dev_name")));
        }

        public function sqlSelectQueryProd(Core $core) {

            return $core->db->select()->distinct()
                ->from('items', array(
                    'items_code_product'
                ))
                ->joinInner(Inside::LOCAL_TABLE_VIEW_PROD, Inside::LOCAL_TABLE_VIEW_PROD . ".prod_id = items.items_id_prod", array(
                    "prod_name",
                    "prod_desc",
                    "prod_id_mode",
                    "prod_items_count_diff_price_visible",
                    "prod_items_count_diff_sale_visible",
                    "prod_alias_name",
                    "prod_alias_search",
                    "prod_img_normal",
                    "tree_abs_path",
                    "am_name",
                    "prod_title_bonus" => ShopDB::SHOP_SQL_BONUS_NAME,
                    "prod_price" => ShopDB::SHOP_SQL_PROD2VIEW_PRICE
                ))
                ->where("prod_id_mode >= 1")
                ->where($this->getDbSelectFindWhere())
                ->where((($core->url->UrlExplode()->getDomainDevId() != 0) ? $core->db->quoteInto("dev_id = ?", $core->url->UrlExplode()->getDomainDevId()) : "1=1"))
                ->order(array("tree_id", "dev_id", "prod_name"));
        }

      */
}
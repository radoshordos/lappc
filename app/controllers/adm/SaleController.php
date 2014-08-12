<?php

use Authority\Eloquent\ItemsSale;

class SaleController extends \BaseController
{
    protected $sale;

    function __construct(ItemsSale $sale)
    {
        $this->sale = $sale;
    }

    public function index()
    {
        return View::make('adm.summary.sale.index', array(
            'sale' => $this->sale->where('id', '>', '1')->orderBy('id')->get()
        ));
    }
}

/*
    public function getItemsAvailibilityList() {
        return $this->db->fetchAll($this->db->select()
                                ->from("items2availibility", array("ia_id", "ia_name", "ia_visible"))
                                ->columns(array("availibility_count_items" => "(SELECT COUNT(*) FROM items WHERE items.items_id_availibility=ia_id)"))
                                ->columns(array("availibility_count_akce" => "(SELECT COUNT(*) FROM akce WHERE akce.akce_id_availibility=ia_id)"))
                                ->where("ia_id > 0")
                                ->order(array("ia_id"))
        );
    }
*/
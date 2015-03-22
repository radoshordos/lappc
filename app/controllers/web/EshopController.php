<?php

use Authority\Eloquent\AkceTempl;
use Authority\Eloquent\Items;
use Authority\Eloquent\ItemsAccessory;
use Authority\Eloquent\MediaDb;
use Authority\Eloquent\MixtureItem;
use Authority\Eloquent\ProdDescription;
use Authority\Eloquent\ProdPicture;
use Authority\Eloquent\ViewProd;
use Authority\Eloquent\ViewTree;
use Authority\Eloquent\BuyOrderDbItems;
use Authority\Web\Group\TreeMaster;

class EshopController extends BaseController
{
    private $view_tree_array;
    private $term;
    private $sid;

    public function __construct()
    {
        $this->sid = Session::getId();
        $this->view_tree_array = ViewTree::whereIn('tree_group_type', ['prodaction', 'prodlist'])->orderBy('tree_id')->get();
        $this->term = Input::get('term');
//      var_dump($this->leftMenu());
    }

    protected function leftMenu()
    {
        $arr = [];
        foreach ([21,22] as $val) {
            $arr[$val] = ViewTree::select(['tree_absolute', 'tree_name', 'tree_deep'])->where('tree_group_id', '=', $val)->orderBy('tree_id')->get()->toArray();
        }
        return $arr;
    }

    protected function setupLayout()
    {
        if (!is_null($this->layout)) {
            $this->layout = View::make($this->layout);
        }
    }

    protected function buyBoxPrice()
    {
        return BuyOrderDbItems::selectRaw('(SELECT ROUND(SUM(buy_order_db_items.item_count * buy_order_db_items.item_price))) AS buy_box_price')
            ->where('sid', '=', $this->sid)
            ->pluck('buy_box_price');
    }

    protected function isText($urlPart)
    {
        if (in_array($urlPart, ['kontakt'])) {

            return View::make('web.text', [
                'namespace'       => 'text',
                'buy_box_price'   => $this->buyBoxPrice(),
                'view_tree_array' => $this->view_tree_array,
                'term'            => $this->term
            ]);
        }
        return NULL;
    }

    protected function isProudct($urlPart)
    {
        $view_prod_actual = ViewProd::where('prod_alias', '=', $urlPart)->first();
        if (isset($view_prod_actual) && $view_prod_actual->count() > 0) {

            $items_accessory = ItemsAccessory::join('items', 'items.id', '=', 'items_accessory.item_to_id')
                ->join('view_prod', 'items.prod_id', '=', 'view_prod.prod_id')
                ->whereIn('items_accessory.item_from_id', Items::select(["id"])->where('prod_id', '=', $view_prod_actual->prod_id)->lists('id'))
                ->where('view_prod.prod_id', '!=', $view_prod_actual->prod_id)
                ->get();

            $at_row = (intval($view_prod_actual->akce_template_id) > 1 ? AkceTempl::find($view_prod_actual->akce_template_id) : NULL);

            $item_row = NULL;
            if ($view_prod_actual->prod_ic_visible == 1) {
                $item_row = Items::where('prod_id', '=', $view_prod_actual->prod_id)->first();
            }

            $media_dev = MediaDb::select([
                'media_db.variations_id AS media_variations',
                'media_db.source AS media_source',
                'media_db.name AS media_name'
            ])->join('mixture_dev', 'media_db.mixture_dev_id', '=', 'mixture_dev.id')
                ->rightJoin('mixture_dev_m2n_dev', 'mixture_dev.id', '=', 'mixture_dev_m2n_dev.mixture_dev_id')
                ->whereNotNull('media_db.mixture_dev_id')
                ->where('mixture_dev_m2n_dev.dev_id', '=', $view_prod_actual->dev_id)
                ->orderBy('variations_id', 'desc')
                ->get();

            $media_prod = MediaDb::select([
                'media_db.variations_id AS media_variations',
                'media_db.source AS media_source',
                'media_db.name AS media_name'
            ])->join('mixture_prod', 'media_db.mixture_prod_id', '=', 'mixture_prod.id')
                ->rightJoin('mixture_prod_m2n_prod', 'mixture_prod.id', '=', 'mixture_prod_m2n_prod.mixture_prod_id')
                ->whereNotNull('media_db.mixture_prod_id')
                ->where('mixture_prod_m2n_prod.prod_id', '=', $view_prod_actual->prod_id)
                ->orderBy('variations_id', 'desc')
                ->get();

            return View::make('web.prod', [
                'namespace'        => 'prod',
                'group'            => 'prod',
                'buy_box_price'    => $this->buyBoxPrice(),
                'view_tree_array'  => $this->view_tree_array,
                'view_tree_actual' => ViewTree::where('tree_id', '=', $view_prod_actual->tree_id)->first(),
                'view_prod_actual' => $view_prod_actual,
                'prod_desc_array'  => ProdDescription::where('prod_id', '=', $view_prod_actual->prod_id)->whereNotNull('data')->get(),
                'term'             => $this->term,
                'prod_picture'     => (($view_prod_actual->prod_picture_count > 0) ? ProdPicture::where('prod_id', '=', $view_prod_actual->prod_id)->get() : NULL),
                'items_accessory'  => $items_accessory,
                'at_row'           => $at_row,
                'item_row'         => $item_row,
                'mi_row'           => ((isset($at_row) && intval($at_row->mixture_item_id) > 0) ? MixtureItem::find(intval($at_row->mixture_item_id)) : NULL),
                'media'            => array_unique(array_merge($media_dev->toArray(), $media_prod->toArray()), SORT_REGULAR)
            ]);
        }
    }

    protected function isTree(array $url, $dev = NULL)
    {
        $tm = new TreeMaster();
        $tm->setDevActual($dev);
        $tm->setViewTreeActual($url);
        $res = $tm->detectTree();

        return (($res === NULL) ? NULL :
            View::make($res::TREE_BLADE_TEMPLATE, [
                'namespace'        => 'tree',
                'group'            => $res::TREE_GROUP_TYPE,
                'buy_box_price'    => $this->buyBoxPrice(),
                'dev_list'         => $res->getDevList(),
                'dev_actual'       => $res->getDevActual(),
                'view_tree_actual' => $res->getViewTreeActual(),
                'view_prod_array'  => $res->getViewProdPagination(),
                'view_tree_array'  => ViewTree::whereIn('tree_group_type', ['prodaction', 'prodlist'])->orderBy('tree_id')->get(),
                'term'             => Input::get('term'),
                'store'            => Input::has('store') ? TRUE : FALSE,
                'action'           => Input::has('action') ? TRUE : FALSE,
            ])
        );
    }
}
<?php namespace Authority\Web\Prod;

use Authority\Eloquent\BuyOrderDbItems;
use Authority\Eloquent\Items;
use Authority\Eloquent\ItemsAccessory;
use Authority\Eloquent\MediaDb;
use Authority\Eloquent\ProdDescription;
use Authority\Eloquent\ViewProd;
use Authority\Eloquent\ViewTree;

class Produkt
{
    private $sid;

    public function __construct($sid, $urlPart)
    {
        $this->sid = $sid;
        $wp = ViewProd::where('prod_alias', '=', $urlPart)->first();

        if (!is_null($wp)) {
            return $this->makeProdukt($wp);
        } else {
            return NULL;
        }
    }

    public function makeProdukt($wp)
    {
        $media_dev = $this->getMediaDev($wp->dev_id);
        $media_prod = $this->getMediaProd($wp->prod_id);

        return View::make('web.prod', [
            'namespace'        => 'prod',
            'group'            => 'prod',
            'items'            => Items::where('prod_id', '=', $wp->prod_id)->get(),
            'view_prod_actual' => $wp,
            'view_tree_actual' => ViewTree::where('tree_id', '=', $wp->tree_id)->first(),
            'prod_picture'     => $this->getProdPicture($wp->prod_id, $wp->prod_picture_count),
            'items_accessory'  => $this->getItemsAccessory($wp->prod_id),
            'prod_desc_array'  => ProdDescription::where('prod_id', '=', $wp->prod_id)->whereNotNull('data')->get(),
            'media'            => array_unique(array_merge($media_dev->toArray(), $media_prod->toArray()), SORT_REGULAR)
        ]);
    }

    protected function getItemsAccessory($prod_id)
    {
        return ItemsAccessory::join('items', 'items.id', '=', 'items_accessory.item_to_id')
            ->join('view_prod', 'items.prod_id', '=', 'view_prod.prod_id')
            ->whereIn('items_accessory.item_from_id', Items::select(["id"])->where('prod_id', '=', $prod_id)->lists('id'))
            ->where('view_prod.prod_id', '!=', $prod_id)
            ->get();
    }

    protected function getMediaDev($dev_id)
    {
        return MediaDb::select([
            'media_db.variations_id AS media_variations',
            'media_db.source AS media_source',
            'media_db.name AS media_name'
        ])->join('mixture_dev', 'media_db.mixture_dev_id', '=', 'mixture_dev.id')
            ->rightJoin('mixture_dev_m2n_dev', 'mixture_dev.id', '=', 'mixture_dev_m2n_dev.mixture_dev_id')
            ->whereNotNull('media_db.mixture_dev_id')
            ->where('mixture_dev_m2n_dev.dev_id', '=', $dev_id)
            ->orderBy('variations_id', 'desc')
            ->get();
    }

    protected function getMediaProd($prod_id)
    {
        return MediaDb::select([
            'media_db.variations_id AS media_variations',
            'media_db.source AS media_source',
            'media_db.name AS media_name'
        ])->join('mixture_prod', 'media_db.mixture_prod_id', '=', 'mixture_prod.id')
            ->rightJoin('mixture_prod_m2n_prod', 'mixture_prod.id', '=', 'mixture_prod_m2n_prod.mixture_prod_id')
            ->whereNotNull('media_db.mixture_prod_id')
            ->where('mixture_prod_m2n_prod.prod_id', '=', $prod_id)
            ->orderBy('variations_id', 'desc')
            ->get();
    }

    protected function getProdPicture($prod_id, $prod_picture_count)
    {
        return ($prod_picture_count > 0 ? ProdPicture::where('prod_id', '=', $prod_id)->get() : NULL);
    }

    protected function buyBoxPrice()
    {
        return BuyOrderDbItems::selectRaw('(SELECT ROUND(SUM(buy_order_db_items.item_count * buy_order_db_items.item_price))) AS buy_box_price')
            ->where('sid', '=', $this->sid)
            ->pluck('buy_box_price');
    }

}
/*
        protected function isProudct($urlPart)
        {


                $at_row = (intval($view_prod_actual->akce_template_id) > 1 ? AkceTempl::find($view_prod_actual->akce_template_id) : NULL);

                $item_row = NULL;
                if ($view_prod_actual->prod_ic_visible == 1) {
                    $item_row = Items::where('prod_id', '=', $view_prod_actual->prod_id)->first();
                }


                return View::make('web.prod', [
                    'view_tree'        => $this->view_tree = ViewTree::where('tree_absolute', '=', $view_prod_actual->tree_absolute)->first(),
                    'buy_box_price'    => $this->buyBoxPrice(),
                    'view_tree'        => $this->view_tree,
                    'term'             => $this->term,
                    'at_row'           => $at_row,
                    'item_row'         => $item_row,
                    'mi_row'           => ((isset($at_row) && intval($at_row->mixture_item_id) > 0) ? MixtureItem::find(intval($at_row->mixture_item_id)) : NULL),

                ]);
            }

*/
}

}
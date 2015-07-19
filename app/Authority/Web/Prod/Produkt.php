<?php namespace Authority\Web\Prod;

use Authority\Eloquent\AkceTempl;
use Authority\Eloquent\Items;
use Authority\Eloquent\ItemsAccessory;
use Authority\Eloquent\MediaDb;
use Authority\Eloquent\ProdDescription;
use Authority\Eloquent\ProdDifference;
use Authority\Eloquent\ProdDifferenceM2nSet;
use Authority\Eloquent\ProdDifferenceValues;
use Authority\Eloquent\ProdPicture;
use Authority\Eloquent\ViewProd;
use Authority\Eloquent\ViewTree;

class Produkt
{
    private $sid;
    private $term;
    private $urlPart;

    public function __construct($sid, $term, $urlPart)
    {
        $this->sid = $sid;
        $this->term = $sid;
        $this->urlPart = $urlPart;
    }

    public function makeProdukt()
    {
        $wp = ViewProd::where('prod_alias', '=', $this->urlPart)->first();

        if (!is_null($wp)) {
            return $this->workProdukt($wp);
        } else {
            return NULL;
        }
    }

    private function workProdukt($wp)
    {
        $items = $this->getItems($wp->prod_id);
        $items_count = count($items);
        $media_dev = $this->getMediaDev($wp->dev_id);
        $media_prod = $this->getMediaProd($wp->prod_id);

        return \View::make('web.prod', [
            'namespace'              => 'prod',
            'group'                  => 'prod',
            'term'                   => $this->term,
            'items'                  => $items,
            'items_count'            => $items_count,
            'view_prod_actual'       => $wp,
            'view_tree'              => ViewTree::where('tree_id', '=', $wp->tree_id)->first(),
            'prod_picture'           => $this->getProdPicture($wp->prod_id, $wp->prod_picture_count),
            'prod_difference'        => $this->getProdDifference($wp->prod_difference_id),
            'prod_difference_values' => $this->getProdDifferenceValues($wp->prod_difference_id),
            'items_accessory'        => $this->getItemsAccessory($wp->prod_id),
            'prod_desc_array'        => ProdDescription::where('prod_id', '=', $wp->prod_id)->whereNotNull('data')->get(),
            'media'                  => array_unique(array_merge($media_dev->toArray(), $media_prod->toArray()), SORT_REGULAR)
        ]);
    }

    protected function getItems($prod_id)
    {
        return Items::where('prod_id', '=', $prod_id)->get();
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

    protected function getProdDifference($prod_difference_id)
    {
        return ($prod_difference_id > 1 ? ProdDifference::find($prod_difference_id)->toArray() : NULL);
    }

    protected function getProdDifferenceValues($prod_difference_id)
    {
        if ($prod_difference_id > 0) {
            $arr = ProdDifferenceM2nSet::select(['set_id'])->where('difference_id', '=', $prod_difference_id)->lists('set_id');
            $values = ProdDifferenceValues::select(['id', 'name'])->whereIn('set_id', $arr)->get()->toArray();
            $arr = [];
            foreach ($values as $val) {
                $arr[$val['id']] = $val['name'];
            }
            return $arr;
        } else {
            return NULL;
        }
    }

    protected function getItemsAccessory($prod_id)
    {
        return ItemsAccessory::join('items', 'items.id', '=', 'items_accessory.item_to_id')
            ->join('view_prod', 'items.prod_id', '=', 'view_prod.prod_id')
            ->whereIn('items_accessory.item_from_id', Items::select(["id"])->where('prod_id', '=', $prod_id)->lists('id'))
            ->where('view_prod.prod_id', '!=', $prod_id)
            ->get();
    }

    protected function getAkceTemplate($prod_mode_id, $akce_template_id)
    {
        return ($prod_mode_id == 4 && !is_null($akce_template_id) ? AkceTempl::find($akce_template_id) : NULL);
    }

    protected function getAkceMixtureItem($prod_mode_id, $akce_template_id)
    {
//        return ($prod_mode_id == 4 && !is_null($akce_template_id) ? AkceTempl::find($akce_template_id)->get() : NULL);
    }


    /*
            protected function isProudct($urlPart)
            {
                    return View::make('web.prod', [
                        'view_tree'        => $this->view_tree = ViewTree::where('tree_absolute', '=', $view_prod_actual->tree_absolute)->first(),
                        'buy_box_price'    => $this->buyBoxPrice(),


                        'at_row'           => $at_row,
                        'item_row'         => $item_row,
                        'mi_row'           => ((isset($at_row) && intval($at_row->mixture_item_id) > 0) ? MixtureItem::find(intval($at_row->mixture_item_id)) : NULL),

                    ]);
                }

    */


}
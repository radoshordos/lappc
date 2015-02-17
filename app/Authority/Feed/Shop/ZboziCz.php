<?php namespace Authority\Feed\Shop;

use Carbon\Carbon;
use Authority\Eloquent\ViewTree;

class ZboziCz extends ShopAbstract
{
    public function feedRender()
    {
        $expiresAt = Carbon::now()->addMinutes(300);
        if (\Cache::has(get_class())) {
            return \Cache::get(get_class());
        } else {
            $this->out .= $this->startDocument();
            $vt = ViewTree::select('tree_id')->where('tree_dir_visible', '>', '0')->get();
            foreach ($vt as $res) {
                foreach ($this->getProd($res->tree_id) as $row) {
                    $this->out .= $this->startShopItem();
                    $this->out .= $this->tagProduct($row);
                    $this->out .= $this->tagDescription($row);
                    $this->out .= $this->tagPriceVat($row);
                    $this->out .= $this->tagManufacturer($row);
                    $this->out .= $this->tagUrl($row);
                    $this->out .= $this->tagUrlImg($row);
                    $this->out .= $this->tagCategoryText($row);
                    $this->out .= $this->endShopItem();
                }
            }
            $this->out .= $this->endDocument();
            \Cache::put(get_class(), $this->out, $expiresAt);
            return $this->out;
        }
    }
}
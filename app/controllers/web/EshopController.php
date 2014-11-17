<?php

use Authority\Eloquent\ViewProd;

class EshopController extends Controller
{
    protected function setupLayout()
    {
        if (!is_null($this->layout)) {
            $this->layout = View::make($this->layout);
        }
    }

    protected function isProudct($urlPart)
    {
        $row = ViewProd::where('prod_alias', '=', $urlPart)->first();
        if (count($row) > 0) {
            return $urlPart . " JE produkt";
        }

    }

    protected function isTree(array $treePart) {
        return $full = implode("\\",$treePart);
    }


}
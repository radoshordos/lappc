<?php


use Authority\Feed\Reader;
use Authority\Feed\ShopItem;
use Authority\Eloquent\PpcDb;

class PpcImportController extends BaseController
{

    public function show()
    {
        if (Input::has('url-file')) {
            try {
                $contents = file_get_contents(Input::get('url-file'));
                var_dump($contents);
                /*
                $fr = new Reader($contents);
                if ($fr) {
                    foreach ($fr->getArr() as $val) {
                        PpcDb::saveShopItem($val);
                    }
                }
                Session::flash('success', 'Přečteno ' . $fr->getCount() . ' záznamů');
                return View::make('adm.ppc.import.show', array('source' => $fr->getArr(), 'count' => $fr->getCount()));
                */
            } catch (ErrorException $e) {
                Session::flash('error', $e->getMessage());
            }
        }
        return View::make('adm.ppc.import.show');
    }
}
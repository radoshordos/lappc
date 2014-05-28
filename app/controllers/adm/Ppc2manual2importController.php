<?php

use Authority\Feed\XmlReader;
use Authority\Feed\XmlShopItem;
use Authority\Eloquent\PpcDb;

class Ppc2manual2importController extends Controller
{
    public function show()
    {
        if (Input::has('url-file')) {
            try {
                $contents = file_get_contents(Input::get('url-file'));
                $fr = new XmlReader($contents);
                if ($fr) {
                    foreach ($fr->getArr() as $val) {
                        PpcDb::saveShopItem($val);
                    }
                }
                Session::flash('success', 'Přečteno '. $fr->getCount(). ' záznamů');
                return View::make('adm.ppc.manual2import.show', array('source' => $fr->getArr(), 'count' => $fr->getCount()));
            } catch (ErrorException $e) {
                Session::flash('error', $e->getMessage());
            }
        }
        return View::make('adm.ppc.manual2import.show');
    }
}
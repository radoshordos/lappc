<?php

use Authority\Feed\Ppc\PpcReader;
use Authority\Eloquent\PpcDb;

class PpcImportController extends BaseController
{

    public function show()
    {
        if (Input::has('url-file')) {
            try {
                $contents = file_get_contents(Input::get('url-file'));

                $fr = new PpcReader($contents);
                if ($fr) {
                    foreach ($fr->getArr() as $val) {
                        PpcDb::saveShopItem($val);
                    }
                }
                Session::flash('success', 'Přečteno ' . $fr->getCount() . ' záznamů');
                return View::make('adm.ppc.import.show', array('input' => Input::all(), 'source' => $fr->getArr(), 'count' => $fr->getCount()));

            } catch (ErrorException $e) {
                Session::flash('error', $e->getMessage());
            }
        }
        return View::make('adm.ppc.import.show', array(
            'input' => Input::all())
        );
    }
}
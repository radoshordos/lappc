<?php

class BuyToptransController extends \BaseController
{
    public function index()
    {
        if (Input::has('zasilka')) {
            $data = file_get_contents("http://www.toptrans.cz/itoptrans/xml_parcel_details?parcel_number=" . Input::get('zasilka'));
        }

        return View::make('adm.buy.toptrans.index', [
            'input' => Input::all(),
            'data'  => (isset($data) ? $data : NULL)
        ]);
    }
}
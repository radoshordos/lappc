<?php

use Authority\Eloquent\ViewProd;

class SearchDataController extends Controller
{
    public function ajax()
    {
        $term = Input::get('term');
        $data = ViewProd::where('prod_name', 'LIKE', "%$term%")->limit(10)->get();
        $result = [];
        foreach ($data as $key => $row) {
            $result[] = ['id' => $row->prod_id, 'value' => $row->prod_name];
        }
        return Response::json($result);
    }

    public function storeroom()
    {
        Input::get('term');
        $data = ViewProd::where('prod_storeroom', '>', 0)->limit(15)->get();
        return View::make('web.ajax.prodlist', ["prod" => $data]);
    }
}
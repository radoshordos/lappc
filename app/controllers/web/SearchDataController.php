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
            $result[] = ['id' => $row->id, 'value' => $row->prod_name];
        }
        return Response::json($result);
    }

} 
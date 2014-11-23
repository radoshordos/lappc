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
        $dev = Input::get('dev');
        $tree = Input::get('tree');
        $store = Input::get('store');
        $action = Input::get('action');
        $sort = Input::get('sort');

        $db = ViewProd::where('prod_mode_id', '>', '1');

        if ($store == 'true') {
            $db->where('prod_storeroom', '>', 0);
        }

        if ($action == 'true') {
            $db->where('prod_mode_id', '=', 4);
        }

        if (intval($tree) > 0) {
            $db->whereBetween('tree_id', [intval($tree), intval($tree) + 9999]);
        }

        if (intval($dev) > 0) {
            $db->where('dev_id', intval($dev));
        }

        if ($sort == 'expensive') {
            $db->orderBy('query_price','DESC');
        } else if ($sort == 'sell') {
            $db->orderBy('query_price','ASC');
        } else if ($sort == 'fresh') {
            $db->orderBy('prod_created_at','DESC');
        } else {
            $db->orderBy('query_price','ASC');
        }

        $data = $db->limit(15)->paginate();
        $data->setBaseUrl('');

        return View::make('web.layout.boxprodlist', ["vp_list" => $data]);
    }
}
<?php

use Authority\Eloquent\ViewProd;
use Authority\Eloquent\ViewTree;
use Authority\Web\Query\AjaxTree;

class SearchDataController extends BaseController
{
    public function ajax()
    {
        $term = Input::get('term');
        $data = ViewProd::where('prod_name', 'LIKE', "%$term%")->where('prod_mode_id','>','1')->limit(10)->get();
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
        $term = Input::get('term');

        $sort = Input::get('sort');

        if (strlen($sort) > 0 && strlen($sort) < 16) {
            Session::put('tree.sort', $sort);
        } else {
            $sort = Session::get('tree.sort');
        }

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

        $ajaxTree = new AjaxTree();
        $db = $ajaxTree->orderBySort($db,$sort);

        $pagination = $db->limit(self::PAGINATE_PAGE)->paginate();
        $pagination->setBaseUrl('');

        if (!empty($term)) {
            $pagination->appends(['term' => $term]);
        }

        return View::make('web.tree.boxprodlist', [
            "view_prod_array" => $pagination,
            'view_tree_actual' => ViewTree::where('tree_id', '=', intval($tree))->first(),
        ]);
    }
}
<?php

use Authority\Eloquent\ViewProd;
use Authority\Eloquent\ViewTree;

class SearchDataController extends BaseController
{
    public function ajax()
    {
        $term = Input::get('term');
        $data = ViewProd::where('prod_name', 'LIKE', "%$term%")->where('prod_mode_id', '>', '1')->limit(10)->get();
        $result = [];
        foreach ($data as $key => $row) {
//            $result[] = ['id' => $row->prod_id, 'value' => $row->prod_name];

//            $(function(){$.widget("custom.catcomplete",$.ui.autocomplete,{_create:function(){this._super();this.widget().menu("option","items","> :not(.ui-autocomplete-category)")},_renderMenu:function(a,k){var g=this,c="";$.each(k,function(d,e){e.category!=c&&(a.append("<li class='ui-autocomplete-category'>"+(1==e.category?jsLANG[0]:jsLANG[1])+"</li>"),c=e.category);li=g._renderItemData(a,e);e.category&&li.attr("aria-label",e.category+" : "+e.label)})}});$.ui.autocomplete.prototype._renderItem=function(a,k){var g=

            $xxx = '<a><span class="img"><img src="' . $row->tree_absolute . $row->prod_img_normal . '" alt="Jolly Caffé Crema - 1000 g, zrnková káva"></span><span class="item">Jolly Caffé Crema - <b>100</b>0 g, zrnková káva<br><em>609&nbsp;Kè</em></span></a>';

            $xxx = "<img src=" . $row->tree_absolute . $row->prod_img_normal . ">";

            $result[] = ['id' => $row->prod_id, 'value' => $row->prod_name];
        }
        return Response::json($result);
    }

    public function storeroom()
    {
        $dev = Input::get('dev');
        $tree = intval(Input::get('tree'));
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

        if ($tree > 0) {
            if ($tree % 10000 == 0) {
                $db->whereBetween('tree_id', [$tree, $tree + 9999]);
            } else if ($tree % 100 == 0) {
                $db->whereBetween('tree_id', [$tree, $tree + 99]);
            } else {
                $db->where('tree_id', '=', $tree);
            }
        }

        if (intval($dev) > 0) {
            $db->where('dev_id', intval($dev));
        }

        $ajaxTree = new AjaxTree();
        $db = $ajaxTree->orderBySort($db, $sort);

        $pagination = $db->limit(self::PAGINATE_PAGE)->paginate();
        $pagination->setBaseUrl('');

        if (!empty($term)) {
            $pagination->appends(['term' => $term]);
        }

        return View::make('web.tree.boxprodlist', [
            "view_prod_array" => $pagination,
            'view_tree_actual' => ViewTree::where('tree_id', '=', $tree)->first(),
        ]);
    }
}
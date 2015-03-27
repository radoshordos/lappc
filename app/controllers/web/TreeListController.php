<?php

use Authority\Web\Group\iProdList;
use Authority\Web\Group\TreeMaster;
use Authority\Eloquent\ViewTree;

class TreeListController extends EshopController
{
    public function ajajtree()
    {
        $tm = new TreeMaster();
        $tm->setDevActual(NULL, Input::get('dev'));
        $tm->setViewTreeActual(NULL, Input::get('tree'));
        $res = $tm->detectTree();
        $res->ajajSort(Input::get('sort'));
        $res->ajajStoreroom(Input::get('store'));
        $res->ajajAction(Input::get('action'));
//      var_dump($res->toDebugSql());

        $actual = $res->getViewTreeActual();
        $pag = $res->getViewProdPagination();
        $pag->setBaseUrl("/" . $actual['tree_absolute']);

        return View::make('web.tree.boxprodlist', [
            'view_prod_array' => $res->getViewProdPagination(),
            'view_tree'       => $this->view_tree,
        ]);
    }
}
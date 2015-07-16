<?php

use Authority\Eloquent\AkceTempl;
use Authority\Eloquent\Items;
use Authority\Eloquent\ItemsAccessory;
use Authority\Eloquent\MediaDb;
use Authority\Eloquent\MixtureItem;
use Authority\Eloquent\ProdDescription;
use Authority\Eloquent\ProdPicture;
use Authority\Eloquent\ViewProd;
use Authority\Eloquent\ViewTree;
use Authority\Eloquent\BuyOrderDbItems;
use Authority\Web\Group\TreeMaster;

class EshopController extends BaseController
{
    protected $view_tree;
    protected $term;
    protected $sid;

    public function __construct()
    {
        $this->sid = Session::getId();
        $this->term = Input::get('term');
    }

    public function __destruct()
    {
        $this->saveHttpRefer();
    }

    protected function setupLayout()
    {
        if (!is_null($this->layout)) {
            $this->layout = View::make($this->layout);
        }
    }

    protected function isText($urlPart)
    {
        if (in_array($urlPart, ['kontakt'])) {

            return View::make('web.text', [
                'namespace'     => 'text',
                'buy_box_price' => $this->buyBoxPrice(),
                'view_tree'     => $this->view_tree,
                'term'          => $this->term
            ]);
        }
        return NULL;
    }

    protected function isTree(array $url, $dev = NULL)
    {
        $tm = new TreeMaster();
        $tm->setDevActual($dev);
        $tm->setViewTreeActual($url);
        $res = $tm->detectTree();
        $vta = $res->getViewTreeActual();

        if ($res::TYPE_OF_TREE === 'group') {

            return View::make($res::TREE_BLADE_TEMPLATE, [
                'namespace'        => $res::TYPE_OF_TREE,
                'group'            => $res::TREE_GROUP_TYPE,
                'view_tree'        => $this->view_tree = ViewTree::where('tree_id', '=', $vta['tree_id'])->first(),
                'buy_box_price'    => $this->buyBoxPrice(),
                'view_tree_actual' => $vta,
                'picture_tree'     => $res->getPictureTree(),
                'term'             => Input::get('term'),
            ]);

        } else {

            return (($res === NULL) ? NULL :

                View::make($res::TREE_BLADE_TEMPLATE, [
                    'namespace'        => $res::TYPE_OF_TREE,
                    'group'            => $res::TREE_GROUP_TYPE,
                    'view_tree'        => $this->view_tree = ViewTree::where('tree_id', '=', $vta['tree_id'])->first(),
                    'buy_box_price'    => $this->buyBoxPrice(),
                    'dev_list'         => $res->getDevList(),
                    'dev_actual'       => $res->getDevActual(),
                    'view_tree_actual' => $vta,
                    'view_prod_array'  => $res->getViewProdPagination(),
                    'view_tree'        => $this->view_tree,
                    'term'             => Input::get('term'),
                    'store'            => Input::has('store') ? TRUE : FALSE,
                    'action'           => Input::has('action') ? TRUE : FALSE,
                ])
            );
        }
    }
}
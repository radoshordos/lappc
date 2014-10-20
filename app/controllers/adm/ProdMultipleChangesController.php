<?php

use \Authority\Tools\SB;

class ProdMultipleChangesController extends \BaseController
{

    public function index()
    {
        return View::make('adm.pattern.multiplechanges.index', [
            'select_dev'                     => SB::option('SELECT * FROM dev WHERE active = 1 ORDER BY id', ['id' => '[->id] - ->name']),
            'select_tree'                    => SB::option('SELECT * FROM view_tree WHERE tree_dir_all > 0', ['tree_id' => '[->tree_id] - [->tree_absolute] - ->tree_name'], TRUE),
            'choice_select_dev'              => Input::get('select_dev'),
            'choice_select_tree'             => Input::get('select_tree'),
            'select_sale'                    => SB::option('SELECT * FROM items_sale', ['id' => '->desc'], TRUE),
            'select_availability'            => SB::option('SELECT * FROM items_availability WHERE id > 1', ['id' => '->name'], TRUE),
            'choice_old_select_sale'         => Input::get('old_select_sale'),
            'choice_new_select_sale'         => Input::get('new_select_sale'),
            'choice_old_select_availability' => Input::get('old_select_availability'),
            'choice_new_select_availability' => Input::get('new_select_availability'),
        ]);
    }

}

/*
class Zbozi_Multiple2changesController extends Zend_Controller_Action {

    public function indexAction() {

        $md = new Zbozi_Model_MultiData();
        $db = Model_Zendb::myfactory();
        $request = $this->getRequest();

        if (intval($request->getParam("prod_id_dev") > 0)) {

            $select = $db->select()
                ->from('items', array("items_id"))
                ->joinInner("prod", Model_Zendb::ZEND_ITEMS_2_PROD, array("prod_id"))
                ->where("items_id_prod > 0")
                ->where(((intval($request->getParam("prod_id_tree")) > 0) ? $db->quoteInto("prod_id_tree = ?", intval($request->getParam("prod_id_tree"))) : "1=1"))
                ->where(((strlen($request->getParam("old_id_sale")) > 0) ? $db->quoteInto("items_id_sale = ?", intval($request->getParam("old_id_sale"))) : "1=1"))
                ->where(((strlen($request->getParam("old_id_avib")) > 0) ? $db->quoteInto("items_id_availibility = ?", intval($request->getParam("old_id_avib"))) : "1=1"))
                ->where(((strlen($request->getParam("old_online")) > 0) ? $db->quoteInto("prod_is_online = ?", intval($request->getParam("old_online"))) : "1=1"))
                ->where("prod_id_dev = ?", intval($request->getParam("prod_id_dev")));

            $list_items = $db->query($select)->fetchAll();

            if (strlen($request->getParam("old_id_sale")) > 0 && strlen($request->getParam("new_id_sale")) > 0) {
                $md->multipleSale($list_items);
            }

            if (strlen($request->getParam("old_id_avib")) > 0 && strlen($request->getParam("new_id_avib")) > 0) {
                $md->multipleAvability($list_items);
            }

            if (strlen($request->getParam("old_online")) > 0 && strlen($request->getParam("new_online")) > 0) {
                $md->multipleOnlineSelling($list_items);
            }
        }
    }

}
*/
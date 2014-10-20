<?php

class ProdMultipleChangesController extends \BaseController {

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
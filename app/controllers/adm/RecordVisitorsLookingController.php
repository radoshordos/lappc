<?php

use Authority\Eloquent\RecordVisitorsLooking;

class RecordVisitorsLookingController extends \BaseController
{
    public function index()
    {
        return View::make('adm.stats.recordvisitors.index', [
            'recordvisitors' => RecordVisitorsLooking::orderBy('id','DESC')->get()
        ]);
    }
}

/*
 *
 if (intval($_GET['domain']) > 0) {
    $select->where("lpf_id_domain = ?", intval($_GET['domain']));
}
if (!empty($_GET['lpf_filter_find'])) {
    $select->where("lpf_filter_find LIKE ?", "%" . trim(strip_tags($_GET['lpf_filter_find'])) . "%");
}

switch (intval($_GET["type"])) {
    case 2:
        $res = $db->fetchAll($select
                        ->from("log2prod2find", array("lpf_filter_find", "lpf_result_count_dev", "lpf_result_count_prod", "pocet" => "COUNT(log2prod2find.lpf_id)"))
                        ->joinLeft("domain", Model_Zendb::ZEND_LOG2PROD2FIND_2_DOMAIN, array("domain_name"))
                        ->group("lpf_filter_find")
                        ->limit(((intval($_GET["limit"]) > 0)) ? intval($_GET["limit"]) : 40)
                        ->order(array("pocet DESC", "lpf_id DESC"))
        );
        break;
    case 3:
        $res = $db->fetchAll($select
                        ->from("log2prod2find", array("lpf_filter_find", "lpf_result_count_dev", "lpf_result_count_prod", "pocet" => "COUNT(lpf_id)"))
                        ->joinLeft("domain", Model_Zendb::ZEND_LOG2PROD2FIND_2_DOMAIN, array("domain_name"))
                        ->group("lpf_filter_find")
                        ->where("lpf_result_count_prod = 0")
                        ->order(array("pocet DESC", "lpf_id DESC"))
                        ->limit(((intval($_GET["limit"]) > 0)) ? intval($_GET["limit"]) : 40)
        );
        break;
    default:
        $res = $db->fetchAll($select
                        ->from("log2prod2find", array("lpf_filter_find", "lpf_ti_create", "lpf_result_count_dev", "lpf_result_count_prod"))
                        ->joinLeft("domain", Model_Zendb::ZEND_LOG2PROD2FIND_2_DOMAIN, array("domain_name"))
                        ->order("lpf_id DESC")
                        ->limit(((intval($_GET["limit"]) > 0)) ? intval($_GET["limit"]) : 40)
        );
        break;
}
 */
<?php

namespace Authority\Runner\Task\Ppc;

use Authority\Runner\Task\iRun;
use Authority\Runner\Task\TaskMessage;
use Authority\Eloquent\PpcDb;
use Authority\Eloquent\PpcRules;
use Authority\Eloquent\PpcDbCache;

class RulesApply extends TaskMessage implements iRun
{

    public function __construct($db)
    {
        parent::__construct($db);
        $this->run();
    }

    public function run()
    {
        $rules = PpcRules::all();
        $i = 0;

        if (!empty($rules)) {
            foreach ($rules as $val) {

                $result = PpcDb::where(function ($query) use ($val) {
                        $query->productNameLenghtMin($val->name_lenght_min);
                        $query->productNameLenghtMax($val->name_lenght_max);
                        $query->priceIsMin($val->price_min);
                        $query->priceIsMax($val->price_max);
                    }
                )->get(array('id'));

                if (count($result) > 0) {

                    foreach ($result as $row) {
                        $cache = new PpcDbCache;
                        $cache->feed_id = 1;
                        $cache->item_id = $row->id;
                        $cache->mode_id = 2;
                        $cache->save();
                        $i++;
                    }
                }
            }
        }
        $this->addMessage("Přiřazeno pro zpracování : <b>" . $i . "</b>");
    }
}

/*

class Sklik_Model_Run_ActiveDbCacheRule extends Sklik_Model_Run_Abstract {

                $arr_edc_id = $db->fetchCol($db->select()
                        ->from('view2sklik2db', array('ed_id'))
                        ->where(($val->getErIdCampagn() ? $db->quoteInto('ed_id_campaign = ?', $val->getErIdCampagn()) : '1=1'))
                        ->where(($val->getErIdDev() ? $db->quoteInto('view_id_dev = ?', $val->getErIdDev()) : '1=1'))
                        ->where(($val->getErIdTree() ? $db->quoteInto('view_id_tree = ?', $val->getErIdTree()) : '1=1'))
                        ->where(($val->getErParamNameWordMin() ? $db->quoteInto('ed_param_name_word >= ?', $val->getErParamNameWordMin()) : '1=1'))
                        ->where(($val->getErParamNameWordMax() ? $db->quoteInto('ed_param_name_word <= ?', $val->getErParamNameWordMax()) : '1=1'))
                        ->where(($val->getErParamSell() ? $db->quoteInto('ed_param_sell = ?', $val->getErParamSell()) : '1=1'))
                        ->where(($val->getErParamAction() ? $db->quoteInto('ed_param_action = ?', $val->getErParamAction()) : '1=1'))
                        ->where(($val->getErParamSendNow() ? $db->quoteInto('ed_param_sendnow = ?', $val->getErParamSendNow()) : '1=1'))
                        ->where('edm_alias = ?', 'noset')
                );
            }
        }
    }
}
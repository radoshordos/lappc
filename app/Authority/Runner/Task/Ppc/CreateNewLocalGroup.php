<?php

namespace Authority\Runner\Task\Ppc;

use Authority\Runner\Task\iRun;
use Authority\Runner\Task\TaskMessage;

class RulesApply extends TaskMessage implements iRun
{

    public function __construct($db)
    {
        parent::__construct($db);
        $this->run();
    }

    public function run()
    {

    }
}

/*
 *     public function runCreateNewLocalGroup() {

        $i = 0;
        $db = Model_Zendb::myfactory();
        $smtdg = new Sklik_Model_Table_DbtGroup();

        $res = $db->fetchAll($db->select()
                        ->from("view2sklik2db", array("ed_id", "view_name"))
                        ->joinLeft("em2group", Sklik_Model_Primary_Db::TABLE_VIEW2SKLIK2DB_2_EM2GROUP, array("eg_id"))
                        ->where("eg_id IS NULL")
                        ->where("edm_alias = ?", "group")
        );

        if (!empty($res)) {
            foreach ($res as $row) {
                $i += $smtdg->insertNewUniqueColumn($row->view_name, array(
                    "eg_ti_create" => strtotime("now"),
                    "eg_id_db" => $row->ed_id,
                    "eg_id_mode" => 1,
                    "eg_group_utm_term" => new Zend_Db_Expr("LOWER('" . Sklik_Model_Primary_Helper::getGroupUmtName($row->view_name) . "')")));
            }
        }

        $this->addMessage("PĹ?idĂĄno novĂ˝ch kampanĂ­ : <b>" . $i . "</b>");
    }

CREATE TABLE IF NOT EXISTS `em2group` (
  `eg_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `eg_ti_create` int(11) NOT NULL,
  `eg_ts_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `eg_id_db` mediumint(8) unsigned NOT NULL,
  `eg_id_ad` smallint(5) unsigned DEFAULT NULL,
  `eg_id_mode` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `eg_tg_ad_count` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `eg_tg_ad_count_sklik` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `eg_tg_keyword_count` smallint(5) unsigned NOT NULL DEFAULT '0',
  `eg_tg_keyword_count_sklik` smallint(5) unsigned NOT NULL DEFAULT '0',
  `eg_sklik_id` int(10) unsigned DEFAULT NULL,
  `eg_group_cpc` smallint(5) unsigned NOT NULL DEFAULT '20',
  `eg_group_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `eg_group_utm_term` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`eg_id`),
  UNIQUE KEY `eg_group_name` (`eg_group_name`),
  UNIQUE KEY `eg_sklik_id` (`eg_sklik_id`),
  KEY `eg_id_mode` (`eg_id_mode`),
  KEY `eg_id_cache` (`eg_id_db`),
  KEY `eq_id_ad` (`eg_id_ad`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8395 ;
 */
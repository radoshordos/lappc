<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RulesDb extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('rules_db');
	}

}

/*
CREATE TABLE IF NOT EXISTS `rules` (
`rules_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `rules_ts_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `rules_ti_create` int(11) NOT NULL,
  `rules_visible` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `rules_priority` tinyint(3) unsigned NOT NULL DEFAULT '3',
  `rules_domain` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `rules_code` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `rules_dev` smallint(5) unsigned NOT NULL DEFAULT '0',
  `rules_media_group` smallint(5) unsigned NOT NULL DEFAULT '0',
  `rules_tree_topdivision` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `rules_tree_division` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `rules_tree` int(10) unsigned NOT NULL DEFAULT '0',
  `rules_prod` smallint(5) unsigned NOT NULL DEFAULT '0',
  `rules_media_type` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `rules_media` smallint(5) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`rules_id`),
  UNIQUE KEY `rules_unique` (`rules_code`,`rules_dev`,`rules_tree_topdivision`,`rules_tree_division`,`rules_tree`,`rules_prod`,`rules_media_type`,`rules_media`),
  KEY `rules_domain` (`rules_domain`),
  KEY `rules_code` (`rules_code`),
  KEY `rules_path_stav_groups` (`rules_tree_topdivision`),
  KEY `rules_path_stav` (`rules_tree_division`),
  KEY `rules_dev` (`rules_dev`),
  KEY `rules_media` (`rules_media`),
  KEY `rules_prod` (`rules_prod`),
  KEY `rules_media_type` (`rules_media_type`),
  KEY `rules_groups` (`rules_media_group`),
  KEY `rules_binding` (`rules_priority`),
  KEY `rules_tree` (`rules_tree`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;
*/
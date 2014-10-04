<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class GrabDb extends Migration {

	public function up()
	{
        Schema::create('grab_db', function (Blueprint $table) {

            $table->increments('id')->unsigned()->primaty();
            $table->boolean('active')->default(1);
            $table->tinyInteger('position')->unsigned();
            $table->string('val1','128');
            $table->string('val2','128');

            $table->engine = 'InnoDB';
        });
	}

	public function down()
	{
        Schema::dropIfExists('grab_db');
	}

}
/*

CREATE TABLE IF NOT EXISTS `filter` (
  `filter_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `filter_id_profile` tinyint(3) unsigned NOT NULL,
  `filter_id_column` tinyint(3) unsigned NOT NULL,
  `filter_id_type` tinyint(3) unsigned NOT NULL,
  `filter_active` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `filter_pozition` tinyint(3) unsigned NOT NULL,
  `filter_val1` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `filter_val2` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`filter_id`),
  UNIQUE KEY `filter_unique` (`filter_id_profile`,`filter_id_column`,`filter_pozition`),
  KEY `filter_id_profile` (`filter_id_profile`),
  KEY `filter_id_column` (`filter_id_column`),
  KEY `filter_id_type` (`filter_id_type`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=439 ;

*/
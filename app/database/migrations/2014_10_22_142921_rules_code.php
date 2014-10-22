<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RulesCode extends Migration {

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
		Schema::dropIfExists('rules_code');
	}

}

/*

CREATE TABLE IF NOT EXISTS `rules2code` (
  `rc_id` tinyint(3) unsigned NOT NULL,
  `rc_visible` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `rc_name` varchar(24) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`rc_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Vypisuji data pro tabulku `rules2code`
--

INSERT INTO `rules2code` (`rc_id`, `rc_visible`, `rc_name`) VALUES
(0, 1, '[NULL]'),
(10, 1, 'Skupiny'),
(20, 1, 'Zboží'),
(100, 1, 'Chybové hlášky');

*/
<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AkceMinitext extends Migration {

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
		//
	}

}

/*
CREATE TABLE IF NOT EXISTS `akce2minitext` (
`am_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `am_default` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `am_name` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`am_id`),
  UNIQUE KEY `am_name` (`am_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

--
-- Vypisuji data pro tabulku `akce2minitext`
--

INSERT INTO `akce2minitext` (`am_id`, `am_default`, `am_name`) VALUES
(1, 1, 'AKCE'),
(3, 1, 'SETOVÁ AKCE'),
(4, 1, 'SUPER CENA'),
(5, 1, 'SUPER AKCE'),
(6, 1, 'AKCE 1 + 1'),
(7, 1, 'SUPER SET'),
(8, 1, 'DOPRODEJ'),
(9, 1, 'VÝPRODEJ'),
(10, 0, 'AKCE TREK 2013'),
(11, 0, 'VÝPRODEJ SPECIALIZED 2012'),
(12, 0, 'zrtuitzutut');

*/
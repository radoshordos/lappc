<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AkceAvailibility extends Migration {

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

CREATE TABLE IF NOT EXISTS `akce2availibility` (
`aa_id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `aa_default` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `aa_name` varchar(96) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`aa_id`),
  UNIQUE KEY `aa_name` (`aa_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Vypisuji data pro tabulku `akce2availibility`
--

INSERT INTO `akce2availibility` (`aa_id`, `aa_default`, `aa_name`) VALUES
(0, 1, '[NULL]'),
(1, 1, 'Akce platí do vyprodání zásob'),
(2, 1, 'Akce platí do vyprodání skladových zásob'),
(3, 0, 'jhkjhkjhkhj'),
(4, 0, 'jhkjhkjhkhjtzujhgjhg'),
(5, 0, 'jhkjhkjhkhjtzujhgjhgjhkhk'),
(6, 0, 'jhkjhkjhkhjtzujhgjhgjhkhkjhkhkjh');

*/
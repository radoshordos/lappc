<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePpcDbMode extends Migration {

	public function up()
	{
		Schema::create('ppc_db_mode', function(Blueprint $table)
		{
			$table->tinyInteger('id')->unsigned();
            $table->boolean('active');
            $table->string('alias','16');
            $table->string('desc','32');

            $table->engine = 'InnoDB';
            $table->unique('alias');
		});
	}

	public function down()
	{
		Schema::drop('ppc_db_mode');
	}
}


/*
 *
 * CREATE TABLE IF NOT EXISTS `em2db2mode` (
  `edm_id` tinyint(3) unsigned NOT NULL,
  `edm_active` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `edm_alias` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `edm_name` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`edm_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Vypisuji data pro tabulku `em2db2mode`
--

INSERT INTO `em2db2mode` (`edm_id`, `edm_active`, `edm_alias`, `edm_name`) VALUES
(1, 0, 'noset', '[A/N]'),
(2, 1, 'group', 'Sestava'),
(3, 1, 'keyword', 'Klíčové slovo'),
(9, 1, 'noaction', 'Nebude využito');
 */
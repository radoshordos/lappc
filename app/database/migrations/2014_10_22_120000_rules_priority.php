<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class RulesPriority extends Migration {

	public function up()
	{
        Schema::create('rules_priory', function (Blueprint $table) {
            $table->tinyInteger('id')->unsigned()->primary();
            $table->boolean('visible')->default(0);
            $table->string('name')->unique();
            $table->engine = 'InnoDB';
        });
	}

    public function down()
	{
		Schema::dropIfExists('rules_priory');
	}

}
/*
CREATE TABLE IF NOT EXISTS `rules2priority` (
`rp_id` tinyint(3) unsigned NOT NULL,
  `rp_visible` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `rp_name` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`rp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Vypisuji data pro tabulku `rules2priority`
--

INSERT INTO `rules2priority` (`rp_id`, `rp_visible`, `rp_name`) VALUES
(1, 0, 'Maximální'),
(2, 1, 'Vysoká'),
(3, 1, 'Normální'),
(4, 1, 'Nízká'),
(5, 0, 'Minimální');
*/

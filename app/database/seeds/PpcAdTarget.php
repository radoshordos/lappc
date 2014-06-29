<?php


class PpcAdTargetSeeder extends Seeder
{
    public function run()
    {
        DB::table('ppc_ad_quality')->delete();

    }
}

/*
CREATE TABLE IF NOT EXISTS `em2ad2target` (
  `eat_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `eat_id_dev` smallint(5) unsigned NOT NULL,
  `eat_id_tree` mediumint(8) unsigned NOT NULL,
  `eat_index` smallint(5) unsigned NOT NULL,
  PRIMARY KEY (`eat_id`),
  KEY `eat_id_dev` (`eat_id_dev`),
  KEY `eat_id_tree` (`eat_id_tree`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=14 ;

--
-- Vypisuji data pro tabulku `em2ad2target`
--

INSERT INTO `em2ad2target` (`eat_id`, `eat_id_dev`, `eat_id_tree`, `eat_index`) VALUES
(1, 0, 0, 0),
(9, 5, 1132030, 3000),
(11, 35, 0, 1000),
(12, 5, 0, 1000),
(13, 30, 0, 1000);
*/
<?php


class PpcAd extends Seeder
{
    public function run()
    {
        DB::table('ppc_ad')->delete();


    }
}

/*
CREATE TABLE IF NOT EXISTS `em2rules2priority` (
  `erp_id` tinyint(3) unsigned NOT NULL,
  `erp_visible` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `erm_name` varchar(24) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`erp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Vypisuji data pro tabulku `em2rules2priority`
--

INSERT INTO `em2rules2priority` (`erp_id`, `erp_visible`, `erm_name`) VALUES
(1, 0, 'Žádná'),
(3, 1, 'Nejnižší'),
(4, 1, 'Nízká'),
(5, 1, 'Standard'),
(6, 1, 'Vysoká'),
(7, 1, 'Nejvyšší'),
(9, 0, 'Kritická');
*/
<?php


class PpcAd extends Seeder
{
    public function run()
    {
        DB::table('ppc_ad_quality')->delete();


    }
}

/*
CREATE TABLE IF NOT EXISTS `em2ad2quality` (
  `eaq_id` tinyint(3) unsigned NOT NULL,
  `eaq_visible` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `eaq_index` tinyint(3) unsigned NOT NULL,
  `eaq_name` varchar(48) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`eaq_id`),
  UNIQUE KEY `eaq_index` (`eaq_index`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Vypisuji data pro tabulku `em2ad2quality`
--

INSERT INTO `em2ad2quality` (`eaq_id`, `eaq_visible`, `eaq_index`, `eaq_name`) VALUES
(1, 1, 0, 'Univerzální'),
(2, 0, 1, 'Skladem'),
(4, 0, 2, 'Akce'),
(6, 0, 3, 'Akce + Skladem'),
(8, 1, 4, 'Cena'),
(10, 1, 5, 'Cena + Skladem'),
(12, 1, 6, 'Cena + Akce'),
(14, 1, 7, 'Cena + Akce + Skladem');
*/
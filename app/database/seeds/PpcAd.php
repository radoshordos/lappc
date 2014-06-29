<?php


class PpcAdSeeder extends Seeder
{
    public function run()
    {
        DB::table('ppc_ad')->delete();
    }
}

/*
  CREATE TABLE IF NOT EXISTS `em2ad` (
  `ea_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `ea_ts_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ea_id_campaign` tinyint(3) unsigned NOT NULL,
  `ea_id_target` smallint(5) unsigned NOT NULL,
  `ea_id_quality` tinyint(3) unsigned NOT NULL,
  `ea_creative1` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `ea_creative2` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `ea_creative3` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ea_id`),
  UNIQUE KEY `ea_id_unique` (`ea_id_campaign`,`ea_id_target`,`ea_id_quality`),
  KEY `ea_id_type` (`ea_id_target`),
  KEY `ea_id_quality` (`ea_id_quality`),
  KEY `ea_id_campaign` (`ea_id_campaign`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=25 ;

--
-- Vypisuji data pro tabulku `em2ad`
--

INSERT INTO `em2ad` (`ea_id`, `ea_ts_update`, `ea_id_campaign`, `ea_id_target`, `ea_id_quality`, `ea_creative1`, `ea_creative2`, `ea_creative3`) VALUES
(9, '2012-12-18 15:23:38', 4, 1, 1, 'Doležalová s.r.o', 'Specializovaný obchod s nářadím', 'servis, prodej, náhradní díly'),
(10, '0000-00-00 00:00:00', 4, 1, 8, '[NAME]', 'Kupte si [NAME]', 'Snadný nákup za cenu [PRICE] Kč'),
(11, '0000-00-00 00:00:00', 4, 1, 10, '[NAME]', 'Kupte u nás [NAME]', 'U nás skladem a za cenu [PRICE] Kč'),
(13, '0000-00-00 00:00:00', 4, 1, 14, '[NAME]', 'Kupte si [NAME]', 'V akci za cenu [PRICE] Kč a skladem'),
(14, '0000-00-00 00:00:00', 4, 1, 12, '[NAME]', 'Kupte u nás [NAME]', 'U nás akci za cenu [PRICE] Kč'),
(15, '0000-00-00 00:00:00', 3, 1, 1, 'Doležalová s.r.o', 'Specializovaný obchod s nářadím', 'servis, prodej, náhradní díly'),
(16, '0000-00-00 00:00:00', 2, 1, 1, 'Doležalová s.r.o', 'Specializovaný obchod s nářadím', 'servis, prodej, náhradní díly'),
(19, '0000-00-00 00:00:00', 4, 9, 10, 'Kladivo SDS-PLUS [NAME]', '[NAME] za cenu [PRICE] Kč', 'U nás skladem, zítra u Vás doma'),
(20, '0000-00-00 00:00:00', 4, 11, 1, 'Nářadí Proma', '[NAME] za cenu [PRICE] Kč', 'servis, prodej, náhradní díly'),
(21, '0000-00-00 00:00:00', 4, 12, 12, '[NAME]', 'Nářadí [NAME] ', 'U nás skladem a za cenu [PRICE] Kč'),
(22, '0000-00-00 00:00:00', 4, 12, 14, '[NAME] [PRICE] ', 'U nás skladem', 'U nás v akci'),
(24, '0000-00-00 00:00:00', 4, 13, 1, '[NAME]', 'Zahradní technika Dolmar', 'Prodej online, servis');

 */
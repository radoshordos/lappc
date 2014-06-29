<?php


class PpcGroup extends Seeder
{
    public function run()
    {
        DB::table('ppc_ad')->delete();


    }
}

/*
CREATE TABLE IF NOT EXISTS `em2group` (
  `eg_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `eg_ti_create` int(11) NOT NULL,
  `eg_ts_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `eg_id_db` mediumint(8) unsigned NOT NULL,
  `eg_id_ad` smallint(5) unsigned DEFAULT NULL,
  `eg_id_mode` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `eg_tg_ad_count` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `eg_tg_ad_count_sklik` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `eg_tg_keyword_count` smallint(5) unsigned NOT NULL DEFAULT '0',
  `eg_tg_keyword_count_sklik` smallint(5) unsigned NOT NULL DEFAULT '0',
  `eg_sklik_id` int(10) unsigned DEFAULT NULL,
  `eg_group_cpc` smallint(5) unsigned NOT NULL DEFAULT '20',
  `eg_group_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `eg_group_utm_term` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`eg_id`),
  UNIQUE KEY `eg_group_name` (`eg_group_name`),
  UNIQUE KEY `eg_sklik_id` (`eg_sklik_id`),
  KEY `eg_id_mode` (`eg_id_mode`),
  KEY `eg_id_cache` (`eg_id_db`),
  KEY `eq_id_ad` (`eg_id_ad`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8395 ;

--
-- Vypisuji data pro tabulku `em2group`
--

INSERT INTO `em2group` (`eg_id`, `eg_ti_create`, `eg_ts_update`, `eg_id_db`, `eg_id_ad`, `eg_id_mode`, `eg_tg_ad_count`, `eg_tg_ad_count_sklik`, `eg_tg_keyword_count`, `eg_tg_keyword_count_sklik`, `eg_sklik_id`, `eg_group_cpc`, `eg_group_name`, `eg_group_utm_term`) VALUES
(8222, 1355844042, '2012-12-18 18:08:36', 12149, NULL, 1, 1, 1, 1, 1, 6519221, 20, 'Makita 6270DWAET2', 'makita-6270dwaet2'),
(8223, 1355844042, '2012-12-18 17:59:48', 12208, NULL, 1, 1, 1, 1, 1, 6519262, 20, 'Makita DA391DW', 'makita-da391dw'),
(8224, 1355844042, '2012-12-26 13:51:04', 12273, NULL, 1, 1, 1, 1, 1, 6519305, 20, 'Makita 9558HNK', 'makita-9558hnk'),
(8225, 1355844042, '2012-12-18 18:05:11', 12377, NULL, 1, 1, 1, 1, 1, 6519350, 20, 'Makita SA7000C', 'makita-sa7000c'),
(8226, 1355844042, '2012-12-18 17:49:49', 12458, NULL, 1, 1, 1, 1, 1, 6519385, 20, 'Makita 3708F', 'makita-3708f'),
(8227, 1355844042, '2012-12-18 17:50:05', 12530, NULL, 1, 1, 1, 1, 1, 6519409, 20, 'Makita HK0500', 'makita-hk0500'),
(8228, 1355844042, '2012-12-26 13:49:12', 12539, NULL, 1, 1, 1, 1, 1, 6519416, 20, 'Makita HR2432', 'makita-hr2432'),
(8229, 1355844042, '2012-12-26 13:49:02', 12617, NULL, 1, 1, 1, 1, 1, 6614912, 20, 'Dolmar ES 2045 A', 'dolmar-es-2045-a'),


 */
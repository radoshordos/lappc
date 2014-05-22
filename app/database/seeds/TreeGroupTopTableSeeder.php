<?php

class TreeGroupTopTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('tree_group_top')->delete();
        DB::insert('INSERT INTO tree_group_top (id, name) VALUES (?, ?)', array(1, '[NULL]'));
        DB::insert('INSERT INTO tree_group_top (id, name) VALUES (?, ?)', array(10, 'Úvodní strana'));
        DB::insert('INSERT INTO tree_group_top (id, name) VALUES (?, ?)', array(20, 'Zboží'));
        DB::insert('INSERT INTO tree_group_top (id, name) VALUES (?, ?)', array(50, 'Různé'));
        DB::insert('INSERT INTO tree_group_top (id, name) VALUES (?, ?)', array(90, 'Nákupní košík'));
    }
}

/*

CREATE TABLE IF NOT EXISTS `tree2division` (
`td_id` tinyint(3) unsigned NOT NULL,
  `td_id_topdivision` tinyint(3) unsigned NOT NULL,
  `td_visible` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `td_prod_reserve` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `td_alias_name` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `td_name` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`td_id`),
  KEY `td_id_topdivision` (`td_id_topdivision`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Vypisuji data pro tabulku `tree2division`
--

INSERT INTO `tree2division` (`td_id`, `td_id_topdivision`, `td_visible`, `td_prod_reserve`, `td_alias_name`, `td_name`) VALUES
(0, 0, 0, 0, 'null', '[NULL]'),
(10, 10, 1, 0, 'startpage', 'Úvodní strana'),
(21, 20, 1, 1, 'prodlist', 'Nářadí, nástroje'),
(22, 20, 1, 1, 'prodlist', 'Zahradní technika'),
(23, 20, 1, 1, 'prodlist', 'Příslušenství'),
(25, 20, 1, 0, 'prodfind', 'Vyhledánání'),
(26, 20, 1, 0, 'prodaction', 'Akční ceny'),
(27, 20, 1, 0, 'prodnew', 'Novinky'),
(31, 30, 1, 0, 'text', 'Text'),
(32, 30, 1, 0, 'devtext', 'Text o výrobcích'),
(39, 30, 1, 0, 'text', 'Obchodní podmínky'),
(51, 50, 1, 0, 'webmap', 'Mapa webu'),
(90, 90, 1, 0, 'buybox', 'Nákupní košík');

*/
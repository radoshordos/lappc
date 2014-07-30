<?php

class SyncCsvColumnTableSeeder extends Seeder {

	public function run()
	{
        DB::table('sync_csv_column')->delete();

        DB::table('sync_csv_column')->insert(array(
            'id' => 2,
            'element' => 'name',
        ));

        DB::table('sync_csv_column')->insert(array(
            'id' => 5,
            'element' => 'desc',
        ));

        DB::table('sync_csv_column')->insert(array(
            'id' => 11,
            'element' => 'codeprod',
        ));

        DB::table('sync_csv_column')->insert(array(
            'id' => 12,
            'element' => 'codeean',
        ));

        DB::table('sync_csv_column')->insert(array(
            'id' => 21,
            'element' => 'cena_stnd',
            'desc' => 'Běžná cena produktu'
        ));

        DB::table('sync_csv_column')->insert(array(
            'id' => 22,
            'element' => 'cena_akce',
            'desc' => 'Akční cena, která jde dále ovlivnovat proentuálníma slevama'
        ));

        DB::table('sync_csv_column')->insert(array(
            'id' => 23,
            'element' => 'cena_inet',
            'desc' => 'Pevná akční cena, na kterou se neaplikují další slevy'
        ));

        DB::table('sync_csv_column')->insert(array(
            'id' => 101,
            'element' => 'dev_id',
            'desc' => '#ID výrobce v e-shopu'
        ));

	}

}

/*
MT070E	Maktec MT070E	Aku vrtací šroubovák Maktec Li-ion 14,4V/1,1Ah	3990	0088381617635
MT071E	Maktec MT071E	Aku vrtací šroubovák Maktec Li-ion 18V/1,1Ah	4490	0088381617659
MT080E	Maktec MT080E	Aku příklepový šroubovák Maktec Li-ion 14,4V/1,1Ah	4290	0088381617673
MT081E	Maktec MT081E	Aku příklepový šroubovák Maktec Li-ion 18V/1,1Ah	4790	0088381617697
MT191	Maktec MT191	Hoblík Maktec 82mm,580W	2990	0088381620437
MT361	Maktec MT361	Vrchní frézka Maktec 900W	3990	0088381620079
MT431	Maktec MT431	Přímočará pila Maktec 450W	1990	0088381609791
MT450K	Maktec MT450K	Pila ocaska Maktec s kufrem, 1010W	3490
MT582	Maktec MT582	Ruční kotoučová pila Maktec 190mm,1050W	3290	0088381610322
MT607	Maktec MT607	Vrtačka Maktec 450W	1690	0088381620222
MT815K	Maktec MT815K	Příklepová vrtačka s kufrem Maktec 710W	1990	0088381609333
MT870	Maktec MT870	Vrtací kladivo Maktec 710W	3290	0088381622998
MT903	Maktec MT903	Úhlová bruska Maktec 230mm,2000W	2690	0088381610353
MT923	Maktec MT923	Vibrační bruska 93x185mm,190W	1690	0088381612241
MT924	Maktec MT924	Excentrická bruska Maktec 123mm,230W	2190	0088381618977
MT941	Maktec MT941	Pásová bruska Maktec 610x100mm,940W	4990	0088381634632
MT962	Maktec MT962	Úhlová bruska Maktec 115mm,570W	1390	0088381609487
MT963	Maktec MT963	Úhlová bruska Maktec 125mm,570W	1490	0088381609500
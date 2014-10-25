<?php

class SyncDbTableSeeder extends Seeder {

	public function run()
	{
        DB::table('sync_db')->delete();

        DB::table('sync_db')->insert(array(
            'dev_id' => 6,
            'code_prod' => 'MT070E',
            'name' => 'Maktec MT070E',
            'desc' => 'Aku vrtací šroubovák Maktec Li-ion 14,4V/1,1Ah',
            'price_standard' => '3990',
            'code_ean'  => '0088381617635'
        ));

        DB::table('sync_db')->insert(array(
            'dev_id' => 6,
            'code_prod' => 'MT071E',
            'name' => 'Maktec MT071E',
            'desc' => 'Aku vrtací šroubovák Maktec Li-ion 18V/1,1Ah',
            'price_standard' => '4490',
            'code_ean'  => '0088381617659'
        ));

        DB::table('sync_db')->insert(array(
            'dev_id' => 6,
            'code_prod' => 'MT080E',
            'name' => 'Maktec MT080E',
            'desc' => 'Aku příklepový šroubovák Maktec Li-ion 14,4V/1,1Ah',
            'price_standard' => '4290',
            'code_ean'  => '0088381617673'
        ));

        DB::table('sync_db')->insert(array(
            'dev_id' => 6,
            'code_prod' => 'MT081E',
            'name' => 'Maktec MT081E',
            'desc' => 'Aku příklepový šroubovák Maktec Li-ion 18V/1,1Ah',
            'price_standard' => '4790',
            'code_ean'  => '0088381617697'
        ));

        DB::table('sync_db')->insert(array(
            'dev_id' => 6,
            'code_prod' => 'MT191',
            'name' => 'Maktec MT191',
            'desc' => 'Hoblík Maktec 82mm,580W',
            'price_standard' => '2990',
            'code_ean'  => '0088381620437'
        ));

        DB::table('sync_db')->insert(array(
            'dev_id' => 6,
            'code_prod' => 'MT361',
            'name' => 'Maktec MT361',
            'desc' => 'Vrchní frézka Maktec 900W',
            'price_standard' => '3990',
            'code_ean'  => '0088381620079'
        ));

        DB::table('sync_db')->insert(array(
            'dev_id' => 6,
            'code_prod' => 'MT431',
            'name' => 'Maktec MT431',
            'desc' => 'Přímočará pila Maktec 450W',
            'price_standard' => '1990',
            'code_ean'  => '0088381609791'
        ));

        DB::table('sync_db')->insert(array(
            'dev_id' => 6,
            'code_prod' => 'MT450K',
            'name' => 'Maktec MT450K',
            'desc' => 'Pila ocaska Maktec s kufrem, 1010W',
            'price_standard' => '3490'
        ));

        DB::table('sync_db')->insert(array(
            'dev_id' => 6,
            'code_prod' => 'MT582',
            'name' => 'Maktec MT582',
            'desc' => 'Ruční kotoučová pila Maktec 190mm,1050W',
            'price_standard' => '3290',
            'code_ean'  => '0088381610322'
        ));

        DB::table('sync_db')->insert(array(
            'dev_id' => 6,
            'code_prod' => 'MT607',
            'name' => 'Maktec MT607',
            'desc' => 'Vrtačka Maktec 450W',
            'price_standard' => '1690',
            'code_ean'  => '0088381620222'
        ));

        DB::table('sync_db')->insert(array(
            'dev_id' => 6,
            'code_prod' => 'MT815K',
            'name' => 'Maktec MT815K',
            'desc' => 'Příklepová vrtačka s kufrem Maktec 710W',
            'price_standard' => '1990',
            'code_ean'  => '0088381609333'
        ));

        DB::table('sync_db')->insert(array(
            'dev_id' => 6,
            'code_prod' => 'MT870',
            'name' => 'Maktec MT870',
            'desc' => 'Vrtací kladivo Maktec 710W',
            'price_standard' => '3290',
            'code_ean'  => '0088381622998'
        ));

        DB::table('sync_db')->insert(array(
            'dev_id' => 6,
            'code_prod' => 'MT903',
            'name' => 'Maktec MT903',
            'desc' => 'Úhlová bruska Maktec 230mm,2000W',
            'price_standard' => '2690',
            'code_ean'  => '0088381610353'
        ));

        DB::table('sync_db')->insert(array(
            'dev_id' => 6,
            'code_prod' => 'MT923',
            'name' => 'Maktec MT923',
            'desc' => 'Vibrační bruska 93x185mm,190W',
            'price_standard' => '1690',
            'code_ean'  => '0088381612241'
        ));

        DB::table('sync_db')->insert(array(
            'dev_id' => 6,
            'code_prod' => 'MT924',
            'name' => 'Maktec MT924',
            'desc' => 'Excentrická bruska Maktec 123mm,230W',
            'price_standard' => '2190',
            'code_ean'  => '0088381618977'
        ));

        DB::table('sync_db')->insert(array(
            'dev_id' => 6,
            'code_prod' => 'MT941',
            'name' => 'Maktec MT941',
            'desc' => 'Pásová bruska Maktec 610x100mm,940W',
            'price_standard' => '4990',
            'code_ean'  => '0088381634632'
        ));

        DB::table('sync_db')->insert(array(
            'dev_id' => 6,
            'code_prod' => 'MT962',
            'name' => 'Maktec MT962',
            'desc' => 'Úhlová bruska Maktec 115mm,570W',
            'price_standard' => '1390',
            'code_ean'  => '0088381609487'
        ));

        DB::table('sync_db')->insert(array(
            'dev_id' => 6,
            'code_prod' => 'MT963',
            'name' => 'Maktec MT963',
            'desc' => 'Úhlová bruska Maktec 125mm,570W',
            'price_standard' => '1490',
            'code_ean'  => '0088381609500'
        ));
    }
}
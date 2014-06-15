<?php

class PpcKeywordsTableSeeder extends Seeder
{

    public function run()
    {

        DB::table('ppc_keywords')->delete();

        DB::table('ppc_keywords')->insert(array(
            'item_id' => 50000,
            'match_id' => 1,
            'name' => 'Admins',
            'cpc' => 20
        ));

        DB::table('ppc_keywords')->insert(array(
            'item_id' => 50001,
            'match_id' => 1,
            'name' => 'HR 3025',
            'cpc' => 20
        ));

        DB::table('ppc_keywords')->insert(array(
            'item_id' => 50002,
            'match_id' => 1,
            'name' => 'BT 545',
            'cpc' => 50
        ));

        DB::table('ppc_keywords')->insert(array(
            'item_id' => 50003,
            'match_id' => 2,
            'name' => 'Seat Toledo',
            'cpc' => 50
        ));

        DB::table('ppc_keywords')->insert(array(
            'item_id' => 50004,
            'match_id' => 2,
            'name' => 'Fiat Punto',
            'cpc' => 50
        ));

        DB::table('ppc_keywords')->insert(array(
            'item_id' => 50005,
            'match_id' => 3,
            'name' => 'Ford Mondeo',
            'cpc' => 50
        ));

        DB::table('ppc_keywords')->insert(array(
            'item_id' => 50006,
            'match_id' => 5,
            'name' => 'Škoda Citi go',
            'cpc' => 50
        ));
    }
}
<?php

class PpcKeywordsTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('ppc_keywords')->delete();

        DB::table('ppc_keywords')->insert(array(
            'item_id' => 50000,
            'sklik_id' => NULL,
            'name' => 'Admins',
            'cpc' => 20
        ));

        DB::table('ppc_keywords')->insert(array(
            'item_id' => 50001,
            'sklik_id' => NULL,
            'name' => 'HR 3025',
            'cpc' => 20
        ));

        DB::table('ppc_keywords')->insert(array(
            'item_id' => 50002,
            'sklik_id' => NULL,
            'name' => 'BT 545',
            'cpc' => 50
        ));

        DB::table('ppc_keywords')->insert(array(
            'item_id' => 50003,
            'sklik_id' => NULL,
            'name' => 'Seat Toledo',
            'cpc' => 50
        ));

        DB::table('ppc_keywords')->insert(array(
            'item_id' => 50004,
            'sklik_id' => NULL,
            'name' => 'Fiat Punto',
            'cpc' => 50
        ));

        DB::table('ppc_keywords')->insert(array(
            'item_id' => 50005,
            'sklik_id' => NULL,
            'name' => 'Ford Mondeo',
            'cpc' => 50
        ));

        DB::table('ppc_keywords')->insert(array(
            'item_id' => 50006,
            'sklik_id' => NULL,
            'name' => 'Škoda Citi go',
            'cpc' => 50
        ));
    }
}
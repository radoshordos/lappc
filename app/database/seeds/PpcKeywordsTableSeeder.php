<?php

class PpcKeywordsTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('ppc_keywords')->delete();

        DB::table('ppc_keywords')->insert(array(
            'sklik_id' => NULL,
            'match_id' => 1,
            'name' => 'Admins',
            'cpc' => 20
        ));

        DB::table('ppc_keywords')->insert(array(
            'sklik_id' => NULL,
            'match_id' => 1,
            'name' => 'HR 3025',
            'cpc' => 20
        ));

        DB::table('ppc_keywords')->insert(array(
            'sklik_id' => NULL,
            'match_id' => 1,
            'name' => 'BT 545',
            'cpc' => 50
        ));

        DB::table('ppc_keywords')->insert(array(
            'sklik_id' => NULL,
            'match_id' => 2,
            'name' => 'Seat Toledo',
            'cpc' => 50
        ));

        DB::table('ppc_keywords')->insert(array(
            'sklik_id' => NULL,
            'match_id' => 2,
            'name' => 'Fiat Punto',
            'cpc' => 50
        ));

        DB::table('ppc_keywords')->insert(array(
            'sklik_id' => NULL,
            'match_id' => 3,
            'name' => 'Ford Mondeo',
            'cpc' => 50
        ));

        DB::table('ppc_keywords')->insert(array(
            'sklik_id' => NULL,
            'match_id' => 3,
            'name' => 'Škoda Citi go',
            'cpc' => 50
        ));
    }
}
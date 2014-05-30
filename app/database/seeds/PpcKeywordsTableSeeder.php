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

    }

}
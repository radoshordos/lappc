<?php

class PpcDbModeTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('ppc_db_mode')->delete();

        DB::table('ppc_db_mode')->insert(array(
            'id' => 1,
            'active' => 0,
            'alias' => 'noset',
            'desc' => '[A/N]',
        ));

        DB::table('ppc_db_mode')->insert(array(
            'id' => 2,
            'active' => 1,
            'alias' => 'group',
            'desc' => 'Sestava',
        ));

        DB::table('ppc_db_mode')->insert(array(
            'id' => 3,
            'active' => 1,
            'alias' => 'keyword',
            'desc' => 'Klíčové slovo',
        ));

        DB::table('ppc_db_mode')->insert(array(
            'id' => 4,
            'active' => 1,
            'alias' => 'noaction',
            'desc' => 'Nebude využito',
        ));
    }
}

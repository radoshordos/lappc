<?php

class DevTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('dev')->delete();

        DB::table('dev')->insert(array(
            'id' => 1,
            'active' => 0,
            'alias' => 'all',
            'name' => '[ALL]'
        ));

        DB::table('dev')->insert(array(
            'id' => 5,
            'active' => 1,
            'alias' => 'makita',
            'name' => 'Makita'
        ));

        DB::table('dev')->insert(array(
            'id' => 6,
            'active' => 1,
            'alias' => 'maktec',
            'name' => 'Maktec'
        ));

        DB::table('dev')->insert(array(
            'id' => 10,
            'active' => 1,
            'alias' => 'narex',
            'name' => 'Narex'
        ));

        DB::table('dev')->insert(array(
            'id' => 20,
            'active' => 1,
            'alias' => 'metabo',
            'name' => 'Metabo'
        ));

        DB::table('dev')->insert(array(
            'id' => 30,
            'active' => 1,
            'alias' => 'dolmar',
            'name' => 'Dolmar'
        ));

        DB::table('dev')->insert(array(
            'id' => 35,
            'active' => 1,
            'alias' => 'proma',
            'name' => 'Proma'
        ));

        DB::table('dev')->insert(array(
            'id' => 40,
            'active' => 1,
            'alias' => 'dewalt',
            'name' => 'Dewalt'
        ));

        DB::table('dev')->insert(array(
            'id' => 45,
            'active' => 1,
            'alias' => 'narex_bystrice',
            'name' => 'Narex Bystřice'
        ));
    }
}
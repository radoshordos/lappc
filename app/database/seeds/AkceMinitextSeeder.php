<?php

class AkceMinitextSeeder extends Seeder
{

    public function run()
    {
        DB::table('akce_minitext')->delete();

        DB::table('akce_minitext')->insert(array(
            'origin' => 1,
            'name' => 'AKCE',
        ));

        DB::table('akce_minitext')->insert(array(
            'origin' => 1,
            'name' => 'SETOVÁ AKCE',
        ));

        DB::table('akce_minitext')->insert(array(
            'origin' => 1,
            'name' => 'SUPER AKCE',
        ));

        DB::table('akce_minitext')->insert(array(
            'origin' => 1,
            'name' => 'MEGA AKCE',
        ));

        DB::table('akce_minitext')->insert(array(
            'origin' => 1,
            'name' => 'AKCE 1 + 1',
        ));

        DB::table('akce_minitext')->insert(array(
            'origin' => 1,
            'name' => 'SUPER SET',
        ));

        DB::table('akce_minitext')->insert(array(
            'origin' => 1,
            'name' => 'DOPRODEJ',
        ));

        DB::table('akce_minitext')->insert(array(
            'origin' => 1,
            'name' => 'VÝPRODEJ',
        ));
    }
}

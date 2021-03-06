<?php

class AkceMinitextSeeder extends Seeder
{

    public function run()
    {
        DB::table('akce_minitext')->delete();


        DB::table('akce_minitext')->insert([
            'id'     => 1,
            'origin' => 1,
            'name'   => 'AKCE',
        ]);

        DB::table('akce_minitext')->insert([
            'id'     => 2,
            'origin' => 1,
            'name'   => 'SETOVÁ AKCE',
        ]);

        DB::table('akce_minitext')->insert([
            'id'     => 3,
            'origin' => 1,
            'name'   => 'SUPER AKCE',
        ]);

        DB::table('akce_minitext')->insert([
            'id'     => 4,
            'origin' => 1,
            'name'   => 'MEGA AKCE',
        ]);

        DB::table('akce_minitext')->insert([
            'id'     => 5,
            'origin' => 1,
            'name'   => 'AKCE 1 + 1',
        ]);

        DB::table('akce_minitext')->insert([
            'id'     => 6,
            'origin' => 1,
            'name'   => 'SUPER SET',
        ]);

        DB::table('akce_minitext')->insert([
            'id'     => 7,
            'origin' => 1,
            'name'   => 'DOPRODEJ',
        ]);

        DB::table('akce_minitext')->insert([
            'id'     => 8,
            'origin' => 1,
            'name'   => 'VÝPRODEJ',
        ]);
    }
}

<?php

class ProdDifferenceSeeder extends Seeder
{

    public function run()
    {
        DB::table('prod_difference')->delete();

        DB::table('prod_difference')->insert([
            'id'    => 1,
            'count' => 0,
            'name'  => 'Základní'
        ]);

        DB::table('prod_difference')->insert([
            'id'    => 11,
            'count' => 1,
            'name'  => 'Velikost'
        ]);

        DB::table('prod_difference')->insert([
            'id'    => 13,
            'count' => 1,
            'name'  => 'Barva'
        ]);

        DB::table('prod_difference')->insert([
            'id'    => 143,
            'count' => 2,
            'name'  => 'Velikost + Barva'
        ]);
    }
}
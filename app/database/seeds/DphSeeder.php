<?php

class DphSeeder extends Seeder
{
    public function run()
    {
        DB::table('dph')->delete();

        DB::table('dph')->insert([
            'id'         => 10,
            'visible'    => 1,
            'multiplier' => 0.909090909090909,
            'name'       => '10%'
        ]);

        DB::table('dph')->insert([
            'id'         => 14,
            'visible'    => 0,
            'multiplier' => 0.8771929824561403,
            'name'       => '14%'
        ]);

        DB::table('dph')->insert([
            'id'         => 15,
            'visible'    => 0,
            'multiplier' => 0.8695652173913043,
            'name'       => '15%'
        ]);

        DB::table('dph')->insert([
            'id'         => 19,
            'visible'    => 0,
            'multiplier' => 0.840336134453782,
            'name'       => '19%'
        ]);

        DB::table('dph')->insert([
            'id'         => 20,
            'visible'    => 0,
            'multiplier' => 0.833333333333333,
            'name'       => '20%'
        ]);

        DB::table('dph')->insert([
            'id'         => 21,
            'visible'    => 1,
            'multiplier' => 0.8264462809917355,
            'name'       => '21%'
        ]);
    }
}
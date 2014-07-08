<?php

class DphSeeder extends Seeder
{

    public function run()
    {
        DB::table('dph')->delete();

        DB::table('dph')->insert(array(
            'id' => 21,
            'multiplier' => 0,8264462809917355,
            'name' => '21%'
        ));
    }
}
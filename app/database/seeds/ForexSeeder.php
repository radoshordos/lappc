<?php

class ForexSeeder extends Seeder
{

    public function run()
    {
        DB::table('forex')->delete();

        DB::table('forex')->insert(array(
            'id' => 1,
            'code' => 'CZK',
            'currency' => 'Kč',
            'exchange_rate' => 1,
            'round_with' => 0,
            'round_without' => 2
        ));

        DB::table('forex')->insert(array(
            'id' => 2,
            'code' => 'EMU',
            'currency' => '€',
            'cnb_date' => '20.08.2013',
            'exchange_rate' => 25.775,
            'round_with' => 2,
            'round_without' => 2
        ));
    }
}
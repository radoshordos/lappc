<?php

class AkceAvailibilitySeeder extends Seeder
{

    public function run()
    {
        DB::table('akce_availability')->delete();

        DB::table('akce_availability')->insert(array(
            'origin' => 1,
            'name' => 'Akce platí do vyprodání zásob',
        ));

        DB::table('akce_availability')->insert(array(
            'origin' => 1,
            'name' => 'Akce platí do vyprodání skladových zásob',
        ));

    }
}

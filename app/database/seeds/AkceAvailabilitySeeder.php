<?php

class AkceAvailabilitySeeder extends Seeder
{

    public function run()
    {
        DB::table('akce_availability')->delete();

        DB::table('akce_availability')->insert([
            'id'     => 1,
            'origin' => 1,
            'name'   => 'Akce platí do vyprodání zásob',
        ]);

        DB::table('akce_availability')->insert([
            'id'     => 2,
            'origin' => 1,
            'name'   => 'Akce platí do vyprodání skladových zásob',
        ]);

    }
}

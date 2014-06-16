<?php

class ItemsAvailabilityTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('items_availability')->delete();

        DB::table('items_availability')->insert(array(
            'id' => 0,
            'name' => 'Stejná jako neakční'
        ));

        DB::table('items_availability')->insert(array(
            'id' => 1,
            'name' => 'Na dotaz'
        ));

        DB::table('items_availability')->insert(array(
            'id' => 2,
            'name' => 'Skladem'
        ));

        DB::table('items_availability')->insert(array(
            'id' => 8,
            'name' => 'Objednává se'
        ));

        DB::table('items_availability')->insert(array(
            'id' => 9,
            'name' => 'Nedostupné'
        ));

        DB::table('items_availability')->insert(array(
            'id' => 24,
            'name' => '1-3 dny'
        ));

        DB::table('items_availability')->insert(array(
            'id' => 26,
            'name' => '3-5 dnů'
        ));
    }
}


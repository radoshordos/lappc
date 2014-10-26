<?php

class ItemsAvailabilityTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('dev')->delete();
        DB::table('items_availability')->delete();

        DB::table('items_availability')->insert([
            'id'   => 1,
            'name' => 'Stejná jako neakční'
        ]);

        DB::table('items_availability')->insert([
            'id'   => 2,
            'name' => 'Na dotaz'
        ]);

        DB::table('items_availability')->insert([
            'id'   => 3,
            'name' => 'Skladem'
        ]);

        DB::table('items_availability')->insert([
            'id'   => 8,
            'name' => 'Objednává se'
        ]);

        DB::table('items_availability')->insert([
            'id'   => 9,
            'name' => 'Nedostupné'
        ]);

        DB::table('items_availability')->insert([
            'id'   => 24,
            'name' => '1-3 dny'
        ]);

        DB::table('items_availability')->insert([
            'id'   => 26,
            'name' => '3-5 dnů'
        ]);
    }
}


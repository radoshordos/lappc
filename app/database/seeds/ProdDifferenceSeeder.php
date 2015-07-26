<?php

class ProdDifferenceSeeder extends Seeder
{
    public function run()
    {
        $prod_difference = [
            ['id' => '1', 'visible' => '1', 'count' => '0', 'name' => 'Základní'],
            ['id' => '11', 'visible' => '1', 'count' => '1', 'name' => 'Velikost'],
            ['id' => '143', 'visible' => '1', 'count' => '2', 'name' => 'Velikost + Barva']
        ];

        DB::table('prod_difference')->delete();

        foreach ($prod_difference as $row) {
            DB::table('prod_difference')->insert([
                'id'    => $row['id'],
                'count' => $row['count'],
                'name'  => $row['name']
            ]);
        }
    }
}
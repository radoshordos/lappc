<?php

class ColumnTableSeeder extends Seeder
{

    public function run()
    {
        $column_table = [
            ['ct_id' => '1', 'ct_name' => '[N/A]'],
            ['ct_id' => '2', 'ct_name' => 'items'],
            ['ct_id' => '3', 'ct_name' => 'prod'],
            ['ct_id' => '11', 'ct_name' => 'tree'],
            ['ct_id' => '12', 'ct_name' => 'dev'],
            ['ct_id' => '10', 'ct_name' => 'sync2items']
        ];

        DB::table('column_table')->delete();

        foreach ($column_table as $row) {

            DB::table('column_table')->insert([
                'id'   => $row['ct_id'],
                'name' => $row['ct_name'],
            ]);
        }
    }

}
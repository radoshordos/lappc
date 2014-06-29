<?php

class ItemsSeeder extends Seeder
{

    public function run()
    {
        DB::table('items')->delete();

        DB::table('items')->insert(array(
            'prod_id' => 1,
            'sale_id' => 1,
            'availability_id' => 1,
            'code_product' => 'test',
            'code_ean' => 'test'
        ));

        DB::table('items')->insert(array(
            'prod_id' => 1,
            'sale_id' => 2,
            'availability_id' => 1,
            'code_product' => 'test2',
            'code_ean' => 'test2'
        ));

    }
}
<?php

class ItemsSaleTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('items_sale')->delete();

        DB::table('items_sale')->insert(array(
            'id' => 0,
            'multiple' => 1,
            'name' => '0%',
            'desc' => 'Běžná cena - 0% sleva'
        ));

        DB::table('items_sale')->insert(array(
            'id' => 1,
            'multiple' => 0.998,
            'name' => '0.2%',
            'desc' => 'Sleva - 0.2% sleva'
        ));

        DB::table('items_sale')->insert(array(
            'id' => 5,
            'multiple' => 0.99,
            'name' => '1%',
            'desc' => 'Sleva - 1% sleva'
        ));

        DB::table('items_sale')->insert(array(
            'id' => 10,
            'multiple' => 0.98,
            'name' => '2%',
            'desc' => 'Sleva - 2% sleva'
        ));

        DB::table('items_sale')->insert(array(
            'id' => 15,
            'multiple' => 0.97,
            'name' => '3%',
            'desc' => 'Sleva - 3% sleva'
        ));

        DB::table('items_sale')->insert(array(
            'id' => 20,
            'multiple' => 0.96,
            'name' => '4%',
            'desc' => 'Sleva - 4% sleva'
        ));

        DB::table('items_sale')->insert(array(
            'id' => 25,
            'multiple' => 0.95,
            'name' => '5%',
            'desc' => 'Sleva - 5% sleva'
        ));
    }
}
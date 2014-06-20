<?php

class ProdWarrantyTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('dev')->delete();
        DB::table('prod_warranty')->delete();

        DB::table('prod_warranty')->insert(array(
            'id' => 1,
            'warranty_month' => 24,
            'name' => '24 měsíců'
        ));

        DB::table('prod_warranty')->insert(array(
            'id' => 2,
            'warranty_month' => 36,
            'name' => '36 měsíců'
        ));
    }
}
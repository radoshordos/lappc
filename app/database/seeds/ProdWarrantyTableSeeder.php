<?php

class ProdWarrantyTableSeeder extends Seeder
{

    public function run()
    {
        $prod2warranty = [
            ['pw_id' => '1', 'pw_visible' => '1', 'pw_warranty' => '24', 'pw_desc' => '24 měsíců', 'pw_name' => '24 měsíců'],
            ['pw_id' => '3', 'pw_visible' => '1', 'pw_warranty' => '36', 'pw_desc' => '2 + 1 Rok', 'pw_name' => '2 + 1 Rok'],
            ['pw_id' => '4', 'pw_visible' => '1', 'pw_warranty' => '36', 'pw_desc' => '36 měsíců', 'pw_name' => '36 měsíců'],
            ['pw_id' => '5', 'pw_visible' => '0', 'pw_warranty' => '36', 'pw_desc' => '3 Roky (6)', 'pw_name' => '3 Roky + vzdušník 6 let'],
            ['pw_id' => '6', 'pw_visible' => '0', 'pw_warranty' => '60', 'pw_desc' => '5 let (=5)', 'pw_name' => '5 let (2+1+2=5)'],
            ['pw_id' => '7', 'pw_visible' => '1', 'pw_warranty' => '36', 'pw_desc' => '2+1 (XXL)', 'pw_name' => '2+1 roky (Metabo XXL)'],
            ['pw_id' => '8', 'pw_visible' => '1', 'pw_warranty' => '60', 'pw_desc' => '5 let', 'pw_name' => '5 let'],
            ['pw_id' => '9', 'pw_visible' => '1', 'pw_warranty' => '72', 'pw_desc' => '6 let', 'pw_name' => '6 let'],
            ['pw_id' => '10', 'pw_visible' => '1', 'pw_warranty' => '48', 'pw_desc' => '4 roky', 'pw_name' => '4 roky'],
            ['pw_id' => '11', 'pw_visible' => '1', 'pw_warranty' => '48', 'pw_desc' => '2 + 2 Roky', 'pw_name' => '2 + 2 Roky'],
            ['pw_id' => '12', 'pw_visible' => '1', 'pw_warranty' => '300', 'pw_desc' => '25 let', 'pw_name' => '25 let']
        ];

        DB::table('prod_warranty')->delete();

        foreach ($prod2warranty as $row) {

            DB::table('prod_warranty')->insert([
                'id'             => $row['pw_id'],
                'warranty_month' => $row['pw_warranty'],
                'name'           => $row['pw_name']
            ]);
        }
    }
}
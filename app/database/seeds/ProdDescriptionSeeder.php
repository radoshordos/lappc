<?php

class ProdDescriptionSeeder extends Seeder
{
    public function run()
    {
        $prod2multi2description = [];
        include "migration/prod2multi2description.php";

        DB::table('prod_description')->delete();

        foreach ($prod2multi2description as $row) {

            $count = DB::table('prod')->where("id", '=', $row['prod_id'])->count();
            if ($count > 0) {
                DB::table('prod_description')->insert([
                    'id'            => $row['id'],
                    'prod_id'       => $row['prod_id'],
                    'variations_id' => $row['variations_id'] + 100,
                    'data'          => $row['data'],
                ]);
            }
        }
    }
}
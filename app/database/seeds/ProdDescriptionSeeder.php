<?php

class ProdDescriptionSeeder extends Seeder
{
    public function run()
    {
        include "migration/prod2multi2description.php";

        DB::table('prod_description')->delete();

        foreach ($prod2multi2description as $row) {

            $count = DB::table('prod')->where("id", '=', $row['prod_id'])->count();
            if ($count > 0) {
                DB::table('prod_description')->insert([
                    'id' => $row['pmd_id'],
                    'prod_id' => $row['pmd_id_prod'],
                    'variations_id' => $row['pmd_id_media_var'],
                    'data' => $row['pmd_data'],
                ]);
            }
        }
    }
}
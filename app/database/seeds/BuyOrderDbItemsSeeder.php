<?php

class BuyOrderDbItemsSeeder extends Seeder
{
    public function run()
    {
        $log2prod2booking = [];
        include "migration/log2prod2booking.php";
        DB::table('buy_order_db_items')->delete();

        foreach ($log2prod2booking as $row) {

            if ($row['lpb_ti_create'] > 1355965515) {
                $row['lpb_id_order'] = $row['lpb_id_order'] + 5000;
            }

            DB::table('buy_order_db_items')->insert([
                'item_id'     => $row['lpb_id_items'],
                'order_id'    => $row['lpb_id_order'],
                'order_group' => $row['lpb_is_group_order'],
                'prod_forex'  => 1,
                'prod_mode'   => $row['lpb_id_prod_mode'],
                'item_count'  => $row['lpb_count'],
                'item_price'  => $row['lpb_price_complete_uni'],
                'created_at'  => date("Y-m-d H:i:s", $row['lpb_ti_create']),
                'updated_at'  => date("Y-m-d H:i:s", $row['lpb_ti_create']),
            ]);
        }
    }
}
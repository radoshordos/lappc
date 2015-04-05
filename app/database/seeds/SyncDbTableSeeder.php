<?php

class SyncDbTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('sync_db')->delete();

        /*
                foreach ($sync_db as $row) {
                    DB::table('sync_db')->insert([
                        'id'           => $row['id'],
                        'purpose'      => $row['purpose'],
                        'record_id'    => $row['record_id'],
                        'item_id'      => $row['item_id'],
                        'dev_id'       => $row['dev_id'],
                        'code_prod'    => $row['code_prod'],
                        'price_action' => $row['price_action'],
                        'name'         => $row['name'],
                        'desc'         => $row['desc'],
                        'created_at'   => $row['created_at'],
                        'updated_at'   => $row['updated_at']
                    ]);
                }
        */
    }
}
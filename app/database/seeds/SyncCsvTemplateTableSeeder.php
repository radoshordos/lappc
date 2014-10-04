<?php

class SyncCsvTemplateTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('sync_csv_template')->delete();

        DB::table('sync_csv_template')->insert([
            'id'             => 1,
            'mixture_dev_id' => 10
        ]);

        DB::table('sync_csv_template')->insert([
            'id'             => 2,
            'mixture_dev_id' => 11
        ]);

        DB::table('sync_csv_template')->insert([
            'id'             => 3,
            'mixture_dev_id' => 10
        ]);
    }
}
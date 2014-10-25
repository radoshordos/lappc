<?php

class SyncTemplateM2nColmunTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('sync_template_m2n_colmun')->delete();

        DB::table('sync_template_m2n_colmun')->insert([
            'template_id' => 1,
            'column_id'   => 11,
        ]);

        DB::table('sync_template_m2n_colmun')->insert([
            'template_id' => 1,
            'column_id'   => 2,
        ]);

        DB::table('sync_template_m2n_colmun')->insert([
            'template_id' => 1,
            'column_id'   => 5,
        ]);

        DB::table('sync_template_m2n_colmun')->insert([
            'template_id' => 1,
            'column_id'   => 12,
        ]);

        DB::table('sync_template_m2n_colmun')->insert([
            'template_id' => 1,
            'column_id'   => 21,
        ]);

        DB::table('sync_template_m2n_colmun')->insert([
            'template_id' => 1,
            'column_id'   => 101,
        ]);

        DB::table('sync_template_m2n_colmun')->insert([
            'template_id' => 2,
            'column_id'   => 11,
        ]);

        DB::table('sync_template_m2n_colmun')->insert([
            'template_id' => 2,
            'column_id'   => 2,
        ]);

        DB::table('sync_template_m2n_colmun')->insert([
            'template_id' => 2,
            'column_id'   => 5,
        ]);

        DB::table('sync_template_m2n_colmun')->insert([
            'template_id' => 2,
            'column_id'   => 12,
        ]);

        DB::table('sync_template_m2n_colmun')->insert([
            'template_id' => 2,
            'column_id'   => 21,
        ]);

        DB::table('sync_template_m2n_colmun')->insert([
            'template_id' => 3,
            'column_id'   => 11,
        ]);

        DB::table('sync_template_m2n_colmun')->insert([
            'template_id' => 3,
            'column_id'   => 5,
        ]);

        DB::table('sync_template_m2n_colmun')->insert([
            'template_id' => 3,
            'column_id'   => 22,
        ]);

        DB::table('sync_template_m2n_colmun')->insert([
            'template_id' => 3,
            'column_id'   => 101,
        ]);

    }
}
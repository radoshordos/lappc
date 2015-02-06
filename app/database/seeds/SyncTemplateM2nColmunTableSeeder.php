<?php

class SyncTemplateM2nColmunTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('sync_template_m2n_colmun')->delete();
    }
}
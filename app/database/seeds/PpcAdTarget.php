<?php

class PpcAdTargetSeeder extends Seeder
{
    public function run()
    {
        DB::table('ppc_ad_target')->delete();

    }
}
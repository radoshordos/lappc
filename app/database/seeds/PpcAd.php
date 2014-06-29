<?php


class PpcAdSeeder extends Seeder
{
    public function run()
    {
        DB::table('ppc_ad')->delete();

        DB::table('ppc_ad')->insert(array(
            'campaign_id' => 1,
            'target_id' => 1,
            'quality_id' => 8,
            'creative1' => '[NAME]',
            'creative2' => 'Kupte si [NAME]',
            'creative3' => 'Snadný nákup za cenu [PRICE] Kč'
        ));

    }
}
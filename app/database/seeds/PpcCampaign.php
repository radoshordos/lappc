<?php

class PpcCampaignSeeder extends Seeder
{
    public function run()
    {
        DB::table('ppc_campaign')->delete();

        DB::table('ppc_campaign')->insert([
            'name' => 'Produkty akční',
            'utm'  => 'prodakce',
        ]);

        DB::table('ppc_campaign')->insert([
            'name' => 'Aku universum neakční',
            'utm'  => 'prodaku',
        ]);
    }
}

<?php


class PpcCampaignSeeder extends Seeder
{
    public function run()
    {
        DB::table('ppc_campaign')->delete();

        DB::table('items_sale')->insert(array(
            'name' => 'Produkty akční',
            'utm' => 'prodakce',
        ));

        DB::table('items_sale')->insert(array(
            'name' => 'Aku universum neakční',
            'utm' => 'prodaku',
        ));
    }
}

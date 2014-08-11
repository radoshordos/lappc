<?php


class ProdTableSeeder extends Seeder {

	public function run()
	{
        DB::table('prod')->delete();

        DB::table('prod')->insert(array(
            'tree_id' => 21020200,
            'dev_id' => 6,
            'warranty_id' => 1,
            'mode_id' => 3,
            'dph_id' => 21,
            'price' => 2890,
            'alias' => 'maktec-mt070e',
            'name' => 'Maktec MT070E',
            'desc' => 'Akumulátorový vrtací šroubovák Maktec MT070E 14,4V Li-Ion, 1,1Ah',
        ));

        DB::table('prod')->insert(array(
            'tree_id' => 21020400,
            'dev_id' => 6,
            'warranty_id' => 1,
            'dph_id' => 21,
            'price' => 5990,
            'mode_id' => 3,
            'alias' => 'makita-bda340z',
            'name' => 'Makita BDA340Z',
            'desc' => 'Akumulátorová úhlová vrtačka BDA340Z 14,4V Li-Ion, bez aku',
        ));

        DB::table('prod')->insert(array(
            'tree_id' => 21020400,
            'dev_id' => 5,
            'warranty_id' => 1,
            'dph_id' => 21,
            'price' => 2690,
            'mode_id' => 4,
            'alias' => 'makita-da330dz',
            'name' => 'Makita DA330DZ',
            'desc' => 'Aku uhlový šroubovák Makita DA330DZ, bez aku',
        ));

        DB::table('prod')->insert(array(
            'tree_id' => 21020600,
            'dev_id' => 5,
            'warranty_id' => 1,
            'dph_id' => 21,
            'price' => 4590,
            'mode_id' => 4,
            'alias' => 'makita-btm50z',
            'name' => 'Makita BTM50Z',
            'desc' => 'Aumulátorový univerzální stroj Makita BTM50Z 18V Li-Ion, bez aku',
        ));

        DB::table('prod')->insert(array(
            'tree_id' => 21020600,
            'dev_id' => 20,
            'warranty_id' => 1,
            'dph_id' => 21,
            'price' => 6690,
            'mode_id' => 1,
            'alias' => 'metabo-w-18-ltx-150-bez-aku',
            'name' => 'Metabo W 18 LTX 150 bez aku',
            'desc' => 'Aku úhlová bruska Metabo W 18 LTX 150 bez aku',
        ));

        DB::table('prod')->insert(array(
            'tree_id' => 21020600,
            'dev_id' => 5,
            'warranty_id' => 1,
            'dph_id' => 21,
            'price' => 21690,
            'mode_id' => 1,
            'alias' => 'makita-bbo180z',
            'name' => 'Makita BBO180Z',
            'desc' => 'Akumulátorová excentrická bruska BBO180Z 18V Li-ion, bez aku',
        ));

        DB::table('prod')->insert(array(
            'tree_id' => 21020600,
            'dev_id' => 40,
            'warranty_id' => 1,
            'dph_id' => 21,
            'price' => 21690,
            'mode_id' => 1,
            'alias' => 'dewalt-dcg422n',
            'name' => 'Dewalt DCG422N',
            'desc' => 'Bruska Dewalt DCG422N, CS 14.4V XR Grinder
',
        ));

	}
}
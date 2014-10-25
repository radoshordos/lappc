<?php

class BuyDeliverySeeder extends Seeder
{

    public function run()
    {
        DB::table('buy_delivery')->delete();

        DB::table('buy_delivery')->insert([
            'id'        => 1,
            'visible'   => 1,
            'name'      => 'Česká pošta',
            'alias'     => 'CESKA_POSTA',
            'price'     => 0,
            'price_doc' => 0
        ]);

        DB::table('buy_delivery')->insert([
            'id'        => 2,
            'visible'   => 1,
            'name'      => 'Česká pošta - Balík Na poštu',
            'alias'     => 'CESKA_POSTA_NA_POSTU',
            'price'     => 0,
            'price_doc' => 0
        ]);

        DB::table('buy_delivery')->insert([
            'id'        => 3,
            'visible'   => 1,
            'name'      => 'ČSAD Logistik Ostrava',
            'alias'     => 'CSAD_LOGISTIK_OSTRAVA',
            'price'     => 0,
            'price_doc' => 0
        ]);

        DB::table('buy_delivery')->insert([
            'id'        => 4,
            'visible'   => 1,
            'name'      => 'DPD',
            'alias'     => 'DPD',
            'price'     => 0,
            'price_doc' => 0
        ]);

        DB::table('buy_delivery')->insert([
            'id'        => 5,
            'visible'   => 1,
            'name'      => 'DHL',
            'alias'     => 'DHL',
            'price'     => 0,
            'price_doc' => 0
        ]);

        DB::table('buy_delivery')->insert([
            'id'        => 6,
            'visible'   => 1,
            'name'      => 'DSV',
            'alias'     => 'DSV',
            'price'     => 0,
            'price_doc' => 0
        ]);

        DB::table('buy_delivery')->insert([
            'id'        => 7,
            'visible'   => 1,
            'name'      => 'EMS',
            'alias'     => 'EMS',
            'price'     => 0,
            'price_doc' => 0
        ]);

        DB::table('buy_delivery')->insert([
            'id'        => 8,
            'visible'   => 1,
            'name'      => 'FOFR',
            'alias'     => 'FOFR',
            'price'     => 0,
            'price_doc' => 0
        ]);

        DB::table('buy_delivery')->insert([
            'id'        => 9,
            'visible'   => 1,
            'name'      => 'Gebrüder Weiss',
            'alias'     => 'GEBRUDER_WEISS',
            'price'     => 0,
            'price_doc' => 0
        ]);

        DB::table('buy_delivery')->insert([
            'id'        => 10,
            'visible'   => 1,
            'name'      => 'Geis',
            'alias'     => 'GEIS',
            'price'     => 0,
            'price_doc' => 0
        ]);

        DB::table('buy_delivery')->insert([
            'id'        => 11,
            'visible'   => 1,
            'name'      => 'General Parcel',
            'alias'     => 'GENERAL_PARCEL',
            'price'     => 0,
            'price_doc' => 0
        ]);

        DB::table('buy_delivery')->insert([
            'id'        => 12,
            'visible'   => 1,
            'name'      => 'GLS',
            'alias'     => 'GLS',
            'price'     => 0,
            'price_doc' => 0
        ]);

        DB::table('buy_delivery')->insert([
            'id'        => 13,
            'visible'   => 1,
            'name'      => 'HDS',
            'alias'     => 'HDS',
            'price'     => 0,
            'price_doc' => 0
        ]);

        DB::table('buy_delivery')->insert([
            'id'        => 14,
            'visible'   => 1,
            'name'      => 'HeurekaPoint',
            'alias'     => 'HEUREKAPOINT',
            'price'     => 0,
            'price_doc' => 0
        ]);

        DB::table('buy_delivery')->insert([
            'id'        => 15,
            'visible'   => 1,
            'name'      => 'InTime',
            'alias'     => 'INTIME',
            'price'     => 0,
            'price_doc' => 0
        ]);

        DB::table('buy_delivery')->insert([
            'id'        => 16,
            'visible'   => 1,
            'name'      => 'PPL',
            'alias'     => 'PPL',
            'price'     => 0,
            'price_doc' => 0
        ]);


        DB::table('buy_delivery')->insert([
            'id'        => 17,
            'visible'   => 1,
            'name'      => 'Radiálka',
            'alias'     => 'RADIALKA',
            'price'     => 0,
            'price_doc' => 0
        ]);

        DB::table('buy_delivery')->insert([
            'id'        => 18,
            'visible'   => 1,
            'name'      => 'Seegmuller',
            'alias'     => 'SEEGMULLER',
            'price'     => 0,
            'price_doc' => 0
        ]);

        DB::table('buy_delivery')->insert([
            'id'        => 19,
            'visible'   => 1,
            'name'      => 'TNT',
            'alias'     => 'TNT',
            'price'     => 0,
            'price_doc' => 0
        ]);

        DB::table('buy_delivery')->insert([
            'id'        => 20,
            'visible'   => 1,
            'name'      => 'TOPTRANS',
            'alias'     => 'TOPTRANS',
            'price'     => 0,
            'price_doc' => 0
        ]);

        DB::table('buy_delivery')->insert([
            'id'        => 21,
            'visible'   => 1,
            'name'      => 'UPS',
            'alias'     => 'UPS',
            'price'     => 0,
            'price_doc' => 0
        ]);

        DB::table('buy_delivery')->insert([
            'id'        => 22,
            'visible'   => 1,
            'name'      => 'Vlastní přeprava',
            'alias'     => 'VLASTNI_PREPRAVA',
            'price'     => 0,
            'price_doc' => 0
        ]);

    }
}



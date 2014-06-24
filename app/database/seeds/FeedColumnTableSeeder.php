<?php

class FeedColumnTableSeeder extends Seeder
{

    public function run()
    {

        DB::table('feed_column')->delete();

        DB::table('feed_column')->insert(array(
            'id' => 1,
            'name' => 'ITEM_ID',
            'support' => 'HEUREKA'
        ));

        DB::table('feed_column')->insert(array(
            'id' => 1,
            'name' => 'PRODUCT',
            'support' => 'SEZNAM'
        ));

        DB::table('feed_column')->insert(array(
            'id' => 2,
            'name' => 'PRODUCTNAME',
            'support' => 'SEZNAM_CZ'
        ));

        DB::table('feed_column')->insert(array(
            'id' => 3,
            'name' => 'DESCRIPTION',
            'support' => 'SEZNAM_CZ'
        ));

        DB::table('feed_column')->insert(array(
            'id' => 4,
            'name' => 'URL',
            'support' => 'SEZNAM_CZ'
        ));

        DB::table('feed_column')->insert(array(
            'id' => 5,
            'name' => 'IMGURL',
            'support' => 'SEZNAM_CZ'
        ));

        DB::table('feed_column')->insert(array(
            'id' => 6,
            'name' => 'PRICE',
            'support' => 'SEZNAM_CZ'
        ));

        DB::table('feed_column')->insert(array(
            'id' => 7,
            'name' => 'VAT',
            'support' => 'SEZNAM_CZ'
        ));

        DB::table('feed_column')->insert(array(
            'id' => 8,
            'name' => 'PRICE_VAT',
            'support' => 'SEZNAM_CZ'
        ));

        DB::table('feed_column')->insert(array(
            'id' => 9,
            'name' => 'MAX_CPC',
            'support' => 'SEZNAM_CZ'
        ));

        DB::table('feed_column')->insert(array(
            'id' => 10,
            'name' => 'DUES',
            'support' => 'SEZNAM_CZ'
        ));

        DB::table('feed_column')->insert(array(
            'id' => 11,
            'name' => 'DELIVERY_DATE',
            'support' => 'SEZNAM_CZ'
        ));

        DB::table('feed_column')->insert(array(
            'id' => 12,
            'name' => 'SHOP_DEPOTS',
            'support' => 'SEZNAM_CZ'
        ));

        DB::table('feed_column')->insert(array(
            'id' => 13,
            'name' => 'ITEM_TYPE',
            'support' => 'SEZNAM_CZ'
        ));

        DB::table('feed_column')->insert(array(
            'id' => 14,
            'name' => 'EXTRA_MESSAGE',
            'support' => 'SEZNAM_CZ'
        ));

        DB::table('feed_column')->insert(array(
            'id' => 15,
            'name' => 'MANUFACTURER',
            'support' => 'SEZNAM_CZ'
        ));

        DB::table('feed_column')->insert(array(
            'id' => 16,
            'name' => 'CATEGORYTEXT',
            'support' => 'SEZNAM_CZ'
        ));

        DB::table('feed_column')->insert(array(
            'id' => 17,
            'name' => 'EAN',
            'support' => 'SEZNAM_CZ'
        ));

        DB::table('feed_column')->insert(array(
            'id' => 18,
            'name' => 'PRODUCTNO',
            'support' => 'SEZNAM_CZ'
        ));

        DB::table('feed_column')->insert(array(
            'id' => 19,
            'name' => 'VARIANT',
            'support' => 'SEZNAM_CZ'
        ));

        DB::table('feed_column')->insert(array(
            'id' => 20,
            'name' => 'PRODUCTNAMEEXT',
            'support' => 'SEZNAM_CZ'
        ));
    }
}
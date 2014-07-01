<?php

class MixtureDevM2nDevTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('mixture_dev_m2n_dev')->delete();

        DB::table('mixture_dev_m2n_dev')->insert(array(
            'mixture_dev_id' => '10',
            'dev_id' => '5'
        ));

        DB::table('mixture_dev_m2n_dev')->insert(array(
            'mixture_dev_id' => '10',
            'dev_id' => '6'
        ));

        DB::table('mixture_dev_m2n_dev')->insert(array(
            'mixture_dev_id' => '10',
            'dev_id' => '30'
        ));
    }
}
<?php

class DevM2nGroupTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('dev_m2n_group')->delete();

        DB::table('dev_m2n_group')->insert(array(
            'group_id' => '10',
            'dev_id' => '5'
        ));

        DB::table('dev_m2n_group')->insert(array(
            'group_id' => '10',
            'dev_id' => '6'
        ));

        DB::table('dev_m2n_group')->insert(array(
            'group_id' => '10',
            'dev_id' => '30'
        ));

    }

}
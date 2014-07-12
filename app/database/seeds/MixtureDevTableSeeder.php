<?php

class MixtureDevTableSeeder extends Seeder {

	public function run()
	{
        DB::table('mixture_dev')->delete();

        DB::table('mixture_dev')->insert(array(
            'id' => 10,
            'purpose' => 'devgroup',
            'name' => 'Makita GROUP'
        ));

        DB::table('mixture_dev')->insert(array(
            'id' => 11,
            'purpose' => 'autosimple',
            'name' => 'ONLY Maktec'
        ));

	}
}
<?php

class MixtureDevTableSeeder extends Seeder {

	public function run()
	{
        DB::table('mixture_dev')->delete();

        DB::table('mixture_dev')->insert(array(
            'id' => 10,
            'name' => 'Makita GROUP'
        ));

        DB::table('mixture_dev')->insert(array(
            'id' => 12,
            'name' => 'Dolmar Only'
        ));

	}
}
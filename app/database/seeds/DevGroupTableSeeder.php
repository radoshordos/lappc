<?php

class DevGroupTableSeeder extends Seeder {

	public function run()
	{
        DB::table('dev_group')->delete();

        DB::table('dev_group')->insert(array(
            'id' => 10,
            'name' => 'Makita GROUP'
        ));

	}
}
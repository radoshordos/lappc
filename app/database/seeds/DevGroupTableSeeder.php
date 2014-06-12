<?php

class DevGroupTableSeeder extends Seeder {

	public function run()
	{
        DB::table('dev_group')->delete();

        DB::table('dev_group')->insert(array(
            'id' => 10,
            'name' => 'Makita GROUP'
        ));

        DB::table('dev_group')->insert(array(
            'id' => 12,
            'name' => 'Dolmar Only'
        ));

	}
}
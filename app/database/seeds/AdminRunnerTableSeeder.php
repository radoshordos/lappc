<?php

class AdminRunnerTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('runner')->delete();

        DB::table('runner')->insert([
            'id' => 11,
            'autorun' => 1,
            'class' => 'Authority\Runner\Task\Ppc\KeywordDb'
        ]);

        DB::table('runner')->insert([
            'id' => 12,
            'autorun' => 1,
            'class' => 'Authority\Runner\Task\Ppc\RulesApply'
        ]);

        DB::table('runner')->insert([
            'id' => 31,
            'autorun' => 1,
            'class' => 'Authority\Runner\Task\Events\MixtureOnlyOneDev'
        ]);

        DB::table('runner')->insert([
            'id' => 39,
            'autorun' => 1,
            'class' => 'Authority\Runner\Task\Events\CnbUpdateForex'
        ]);

        DB::table('runner')->insert([
            'id' => 81,
            'autorun' => 1,
            'class' => 'Authority\Runner\Task\Performance\OptimalizeTable'
        ]);

        DB::table('runner')->insert([
            'id' => 151,
            'autorun' => 1,
            'class' => 'Authority\Runner\Task\Clear\UnusedAkceAvailability'
        ]);

        DB::table('runner')->insert([
            'id' => 152,
            'autorun' => 1,
            'class' => 'Authority\Runner\Task\Clear\UnusedAkceMinitext'
        ]);

        DB::table('runner')->insert([
            'id' => 153,
            'autorun' => 1,
            'class' => 'Authority\Runner\Task\Clear\UnusedProdWarranty'
        ]);

        DB::table('runner')->insert([
            'id' => 154,
            'autorun' => 1,
            'class' => 'Authority\Runner\Task\Clear\UnusedCsvImport'
        ]);

	    DB::table('runner')->insert([
		    'id' => 181,
		    'autorun' => 1,
		    'class' => 'Authority\Runner\Task\Fix\ProdWithoutItem'
	    ]);

        DB::table('runner')->insert([
            'id' => 201,
            'autorun' => 0,
            'class' => 'Authority\Runner\Task\Recalculate\Tree'
        ]);

        DB::table('runner')->insert([
            'id'      => 1002,
            'autorun' => 1,
            'class'   => 'Authority\Runner\Task\Store\SyncBow'
        ]);

        DB::table('runner')->insert([
            'id'      => 1004,
            'autorun' => 1,
            'class'   => 'Authority\Runner\Task\Store\SyncProma'
        ]);

    }
}
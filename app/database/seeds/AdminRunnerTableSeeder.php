<?php

class AdminRunnerTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('runner')->delete();

        DB::table('runner')->insert(array(
            'id' => 11,
            'autorun' => 1,
            'class' => 'Authority\Runner\Task\Ppc\KeywordDb'
        ));

        DB::table('runner')->insert(array(
            'id' => 12,
            'autorun' => 1,
            'class' => 'Authority\Runner\Task\Ppc\RulesApply'
        ));

        DB::table('runner')->insert(array(
            'id' => 31,
            'autorun' => 1,
            'class' => 'Authority\Runner\Task\Events\MixtureOnlyOneDev'
        ));

        DB::table('runner')->insert(array(
            'id' => 39,
            'autorun' => 1,
            'class' => 'Authority\Runner\Task\Events\CnbUpdateForex'
        ));

        DB::table('runner')->insert(array(
            'id' => 81,
            'autorun' => 1,
            'class' => 'Authority\Runner\Task\Performance\OptimalizeTable'
        ));

        DB::table('runner')->insert(array(
            'id' => 151,
            'autorun' => 1,
            'class' => 'Authority\Runner\Task\Clear\UnusedAkceAvailability'
        ));

        DB::table('runner')->insert(array(
            'id' => 152,
            'autorun' => 1,
            'class' => 'Authority\Runner\Task\Clear\UnusedAkceMinitext'
        ));

        DB::table('runner')->insert(array(
            'id' => 153,
            'autorun' => 1,
            'class' => 'Authority\Runner\Task\Clear\UnusedProdWarranty'
        ));

	    DB::table('runner')->insert(array(
		    'id' => 181,
		    'autorun' => 1,
		    'class' => 'Authority\Runner\Task\Fix\ProdWithoutItem'
	    ));

        DB::table('runner')->insert(array(
            'id' => 201,
            'autorun' => 0,
            'class' => 'Authority\Runner\Task\Recalculate\Tree'
        ));
    }
}
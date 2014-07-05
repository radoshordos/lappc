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
            'id' => 81,
            'autorun' => 1,
            'class' => 'Authority\Runner\Task\Performance\OptimalizeTable'
        ));

        DB::table('runner')->insert(array(
            'id' => 121,
            'autorun' => 0,
            'class' => 'Authority\Runner\Task\Recalculate\Tree'
        ));
    }
}
<?php

class AdminRunnerTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('runner')->delete();

        DB::table('runner')->insert(array(
            'id' => 1,
            'autorun' => 1,
            'class' => 'Authority\Runner\Task\Ppc\KeywordDb'
        ));

        DB::table('runner')->insert(array(
            'id' => 2,
            'autorun' => 1,
            'class' => 'Authority\Runner\Task\Ppc\RulesApply'
        ));

        DB::table('runner')->insert(array(
            'id' => 20,
            'autorun' => 1,
            'class' => 'Authority\Runner\Task\Performance\OptimalizeTable'
        ));

    }
}
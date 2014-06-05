<?php

class AdminRunnerTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('runner')->delete();

        DB::table('runner')->insert(array(
            'id' => 1,
            'autorun' => 1,
            'alias' => 'keydb',
            'class' => 'Authority\Runner\Task\Ppc\KeywordDb'
        ));

    }
}
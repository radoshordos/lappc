<?php

class AdminRunnerTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('runner')->delete();

        DB::table('runner')->insert([
            'id'                    => 102,
            'autorun'               => 1,
            'class'                 => 'Authority\Runner\Task\Events\MixtureOnlyOneDev',
            'autorun_first_run_day' => 600
        ]);

        DB::table('runner')->insert([
            'id'                    => 104,
            'autorun'               => 1,
            'class'                 => 'Authority\Runner\Task\Events\OnOldAkceTemplate',
            'autorun_first_run_day' => 1200
        ]);

        DB::table('runner')->insert([
            'id'                    => 106,
            'autorun'               => 1,
            'class'                 => 'Authority\Runner\Task\Events\OnVeryOldHiddenProd',
            'autorun_first_run_day' => 1800
        ]);

        DB::table('runner')->insert([
            'id'                    => 108,
            'autorun'               => 1,
            'class'                 => 'Authority\Runner\Task\Events\CnbUpdateForex',
            'autorun_first_run_day' => 2400
        ]);
        
        DB::table('runner')->insert([
            'id'                    => 302,
            'autorun'               => 1,
            'class'                 => 'Authority\Runner\Task\Fix\ProdAkceInteraction',
            'autorun_first_run_day' => 3000
        ]);

        DB::table('runner')->insert([
            'id'                    => 304,
            'autorun'               => 1,
            'class'                 => 'Authority\Runner\Task\Fix\AddEanFromSync',
            'autorun_first_run_day' => 3600
        ]);

        DB::table('runner')->insert([
            'id'                    => 402,
            'autorun'               => 0,
            'class'                 => 'Authority\Runner\Task\Recalculate\TreeRecalculate',
            'autorun_first_run_day' => 4200
        ]);

        DB::table('runner')->insert([
            'id'                    => 404,
            'autorun'               => 0,
            'class'                 => 'Authority\Runner\Task\Recalculate\ItemsIdInSync',
            'autorun_first_run_day' => 4800
        ]);

        DB::table('runner')->insert([
            'id'                    => 408,
            'autorun'               => 0,
            'class'                 => 'Authority\Runner\Task\Recalculate\ItemsAccessoryNew',
            'autorun_first_run_day' => 5400
        ]);

        DB::table('runner')->insert([
            'id'                    => 410,
            'autorun'               => 0,
            'class'                 => 'Authority\Runner\Task\Recalculate\ProdSearchCode',
            'autorun_first_run_day' => 6000
        ]);

        DB::table('runner')->insert([
            'id'                    => 412,
            'autorun'               => 0,
            'class'                 => 'Authority\Runner\Task\Recalculate\ProdSearchAlias',
            'autorun_first_run_day' => 6600,
        ]);

        DB::table('runner')->insert([
            'id'                    => 414,
            'autorun'               => 0,
            'class'                 => 'Authority\Runner\Task\Recalculate\ProdSearchPrice',
            'autorun_first_run_day' => 7200
        ]);

        DB::table('runner')->insert([
            'id'                    => 416,
            'autorun'               => 0,
            'class'                 => 'Authority\Runner\Task\Recalculate\ProdSearchSell',
            'autorun_first_run_day' => 7800
        ]);

        DB::table('runner')->insert([
            'id'                    => 502,
            'autorun'               => 1,
            'class'                 => 'Authority\Runner\Task\Store\SyncBow',
            'autorun_first_run_day' => 8400
        ]);

        DB::table('runner')->insert([
            'id'                    => 504,
            'autorun'               => 1,
            'class'                 => 'Authority\Runner\Task\Store\SyncGarland',
            'autorun_first_run_day' => 9000
        ]);

        DB::table('runner')->insert([
            'id'                    => 506,
            'autorun'               => 1,
            'class'                 => 'Authority\Runner\Task\Store\SyncIgm',
            'autorun_first_run_day' => 9600
        ]);

        DB::table('runner')->insert([
            'id'                    => 508,
            'autorun'               => 1,
            'class'                 => 'Authority\Runner\Task\Store\SyncMadalbal',
            'autorun_first_run_day' => 10200
        ]);

        DB::table('runner')->insert([
            'id'                    => 510,
            'autorun'               => 1,
            'class'                 => 'Authority\Runner\Task\Store\SyncMakita',
            'autorun_first_run_day' => 10800
        ]);

        DB::table('runner')->insert([
            'id'                    => 512,
            'autorun'               => 1,
            'class'                 => 'Authority\Runner\Task\Store\SyncNarexPrices',
            'autorun_first_run_day' => 11400
        ]);

        DB::table('runner')->insert([
            'id'                    => 514,
            'autorun'               => 1,
            'class'                 => 'Authority\Runner\Task\Store\SyncNarexCatalogue',
            'autorun_first_run_day' => 12000
        ]);

        DB::table('runner')->insert([
            'id'                    => 516,
            'autorun'               => 1,
            'class'                 => 'Authority\Runner\Task\Store\SyncPapaspol',
            'autorun_first_run_day' => 12600
        ]);

        DB::table('runner')->insert([
            'id'                    => 518,
            'autorun'               => 1,
            'class'                 => 'Authority\Runner\Task\Store\SyncProma',
            'autorun_first_run_day' => 13200
        ]);

        DB::table('runner')->insert([
            'id'                    => 520,
            'autorun'               => 1,
            'class'                 => 'Authority\Runner\Task\Store\SyncProteco',
            'autorun_first_run_day' => 13800
        ]);

        DB::table('runner')->insert([
            'id'                    => 522,
            'autorun'               => 1,
            'class'                 => 'Authority\Runner\Task\Store\SyncVgarden',
            'autorun_first_run_day' => 14400
        ]);

        DB::table('runner')->insert([
            'id'                    => 602,
            'autorun'               => 0,
            'class'                 => 'Authority\Runner\Task\OneRun\CreatePicture',
            'autorun_first_run_day' => 15000
        ]);

        DB::table('runner')->insert([
            'id'                    => 604,
            'autorun'               => 0,
            'class'                 => 'Authority\Runner\Task\OneRun\TreeMigrationTable',
            'autorun_first_run_day' => 15600
        ]);

        DB::table('runner')->insert([
            'id'                    => 702,
            'autorun'               => 1,
            'class'                 => 'Authority\Runner\Task\Performance\ClearUnusedTableData',
            'autorun_first_run_day' => 16200
        ]);

        DB::table('runner')->insert([
            'id'                    => 704,
            'autorun'               => 1,
            'class'                 => 'Authority\Runner\Task\Performance\OptimalizeTable',
            'autorun_first_run_day' => 16800
        ]);
    }
}
<?php

class AdminRunnerTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('runner')->delete();

        DB::table('runner')->insert([
            'id'      => 102,
            'autorun' => 1,
            'class'   => 'Authority\Runner\Task\Events\MixtureOnlyOneDev'
        ]);

        DB::table('runner')->insert([
            'id'      => 104,
            'autorun' => 1,
            'class'   => 'Authority\Runner\Task\Events\CnbUpdateForex'
        ]);

        DB::table('runner')->insert([
            'id'      => 202,
            'autorun' => 1,
            'class'   => 'Authority\Runner\Task\Clear\UnusedAkceAvailability'
        ]);

        DB::table('runner')->insert([
            'id'      => 204,
            'autorun' => 1,
            'class'   => 'Authority\Runner\Task\Clear\UnusedAkceMinitext'
        ]);

        DB::table('runner')->insert([
            'id'      => 206,
            'autorun' => 1,
            'class'   => 'Authority\Runner\Task\Clear\UnusedProdWarranty'
        ]);

        DB::table('runner')->insert([
            'id'      => 208,
            'autorun' => 1,
            'class'   => 'Authority\Runner\Task\Clear\UnusedCsvImport'
        ]);

        DB::table('runner')->insert([
            'id'      => 302,
            'autorun' => 1,
            'class'   => 'Authority\Runner\Task\Fix\ProdWithoutItem'
        ]);

        DB::table('runner')->insert([
            'id'      => 304,
            'autorun' => 1,
            'class'   => 'Authority\Runner\Task\Fix\ProdWithoutAkce'
        ]);

        DB::table('runner')->insert([
            'id'      => 306,
            'autorun' => 1,
            'class'   => 'Authority\Runner\Task\Fix\AkceWithoutTemplate'
        ]);

        DB::table('runner')->insert([
            'id'      => 402,
            'autorun' => 0,
            'class'   => 'Authority\Runner\Task\Recalculate\Tree'
        ]);

        DB::table('runner')->insert([
            'id'      => 404,
            'autorun' => 0,
            'class'   => 'Authority\Runner\Task\Recalculate\ItemsIdInSync'
        ]);

        DB::table('runner')->insert([
            'id'      => 406,
            'autorun' => 0,
            'class'   => 'Authority\Runner\Task\Recalculate\TreeCategoryText'
        ]);

        DB::table('runner')->insert([
            'id'      => 502,
            'autorun' => 1,
            'class'   => 'Authority\Runner\Task\Store\SyncBow'
        ]);

        DB::table('runner')->insert([
            'id'      => 504,
            'autorun' => 1,
            'class'   => 'Authority\Runner\Task\Store\SyncProma'
        ]);

        DB::table('runner')->insert([
            'id'      => 506,
            'autorun' => 1,
            'class'   => 'Authority\Runner\Task\Store\SyncGarland'
        ]);

        DB::table('runner')->insert([
            'id'      => 508,
            'autorun' => 1,
            'class'   => 'Authority\Runner\Task\Store\SyncIgm'
        ]);

        DB::table('runner')->insert([
            'id'      => 602,
            'autorun' => 0,
            'class'   => 'Authority\Runner\Task\OneRun\CreatePicture'
        ]);

        DB::table('runner')->insert([
            'id'      => 604,
            'autorun' => 0,
            'class'   => 'Authority\Runner\Task\OneRun\TreeMigrationTable'
        ]);

        DB::table('runner')->insert([
            'id'      => 702,
            'autorun' => 1,
            'class'   => 'Authority\Runner\Task\Performance\OptimalizeTable'
        ]);

    }
}
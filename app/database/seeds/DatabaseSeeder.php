<?php

class DatabaseSeeder extends Seeder
{

    public function run()
    {
        Eloquent::unguard();
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // ADMIN ROLES
        $this->call('SentryGroupSeeder');
        $this->call('SentryUserSeeder');
        $this->call('SentryUserGroupSeeder');

        // CISELNIKY
        $this->call('PpcKeywordsMatchTableSeeder');
        $this->call('PpcAdQualitySeeder');
        $this->call('ProdWarrantyTableSeeder');
        $this->call('ItemsSaleTableSeeder');
        $this->call('ItemsAvailabilityTableSeeder');
        $this->call('TreeGroupTopTableSeeder');
        $this->call('TreeGroupTableSeeder');
        $this->call('ProdModeTableSeeder');
        $this->call('SyncCsvColumnTableSeeder');
        $this->call('DphSeeder');
        $this->call('ForexSeeder');

        // OSTATNI
        $this->call('FeedServiceTableSeeder');
        $this->call('PpcConfigSeeder');
        $this->call('PpcCampaignSeeder');
        $this->call('PpcDbModeTableSeeder');
        $this->call('PpcKeywordsTableSeeder');
        $this->call('PpcAdSeeder');
        $this->call('AdminRunnerTableSeeder');

        $this->call('DevTableSeeder');
        $this->call('TreeTableSeeder');
        $this->call('MixtureDevTableSeeder');
        $this->call('MixtureDevM2nDevTableSeeder');

        $this->call('ProdTableSeeder');
        $this->call('ItemsSeeder');

        $this->call('SyncCsvTemplateTableSeeder');
        $this->call('SyncTemplateM2nColmunTableSeeder');
        $this->call('SyncDbTableSeeder');

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
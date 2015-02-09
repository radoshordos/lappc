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
		$this->call('AkceSaleSeeder');
		$this->call('ProdSaleSeeder');
		$this->call('ItemsAvailabilityTableSeeder');
		$this->call('TreeGroupTopTableSeeder');
		$this->call('TreeGroupTableSeeder');
		$this->call('ProdModeTableSeeder');
		$this->call('SyncCsvColumnTableSeeder');
		$this->call('DphSeeder');
		$this->call('ForexSeeder');
		$this->call('BuyDeliverySeeder');
		$this->call('AkceMinitextSeeder');
		$this->call('AkceAvailabilitySeeder');
		$this->call('MediaTypeSeeder');
		$this->call('GrabModeSeeder');
		$this->call('GrabProfileSeeder');
		$this->call('ColumnTableSeeder');
		$this->call('RecordMarketSellSeeder');
		$this->call('BuyOrderStatusSeeder');
		$this->call('BuyPaymentTypeSeeder');
		$this->call('BuyTransportTypeSeeder');


		// OSTATNI
		$this->call('FeedServiceTableSeeder');
		$this->call('PpcConfigSeeder');
		$this->call('PpcCampaignSeeder');
		$this->call('PpcDbModeTableSeeder');
		$this->call('PpcKeywordsTableSeeder');
		$this->call('PpcAdSeeder');
		$this->call('AdminRunnerTableSeeder');
		$this->call('MediaVariationsSeeder');
		$this->call('GrabFunctionSeeder');
		$this->call('ColumnDbSeeder');
		$this->call('BuyStateSeeder');
		$this->call('BuyTransportSeeder');
		$this->call('BuyPaymentSeeder');
		$this->call('BuyOrderDbItemsSeeder');

		$this->call('DevTableSeeder');
		$this->call('TreeTableSeeder');
		$this->call('MixtureDevTableSeeder');
		$this->call('MixtureDevM2nDevTableSeeder');
		$this->call('ProdDifferenceValuesSeeder');

		$this->call('ProdTableSeeder');
		$this->call('ItemsSeeder');
		$this->call('ProdDescriptionSeeder');

		$this->call('SyncCsvTemplateTableSeeder');
		$this->call('SyncTemplateM2nColumnTableSeeder');
		$this->call('SyncDbTableSeeder');
		$this->call('AkceTemplateSeeder');
		$this->call('ProdDifferenceSetSeeder');
		$this->call('ProdDifferenceN2mSetSeeder');

		$this->call('ProdDifferenceSeeder');
		$this->call('GrabDbSeeder');
		$this->call('MediaDbSeeder');

		DB::statement('SET FOREIGN_KEY_CHECKS=1;');
	}
}
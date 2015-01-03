<?php namespace Authority\Runner\Task\Store;

class RunMadalbal extends AbstractRunDev implements iItem
{
	const ROOT = 'SHOP';

	function __construct($shop_item, $record_id)
	{
		//	var_dump($shop_item['Brand']);
		//	die;
		if (isset($shop_item['Brand'])) {

			echo $shop_item['Brand'] . "<br />";
		}
		//parent::__construct($shop_item, $record_id);
	}

	private function analyseIdDev($dev_name)
	{
		switch ($dev_name) {
			case 'EXTOL CRAFT' :
			case 'EXTOL INDUSTRIAL' :
			case 'EXTOL LIGHT' :
			case 'EXTOL PREMIUM' :
				return 850;
			case 'HERON' :
				return 852;
			case 'BALLETTO' :
				return 854;
			case 'FORTUM' :
				return 856;
			case 'FRESHHH' :
				return 858;
			case 'IMPERIA' :
				return 860;
			case 'KITO' :
				return 862;
			case 'OPERA' :
				return 864;
			case 'SONATA' :
				return 866;
			case 'VIKING' :
				return 868;
			case 'VITTORIA' :
				return 870;
			default :
				return 0;
		}
	}

	function setSyncProdDesc()
	{
		// TODO: Implement setSyncProdDesc() method.
	}

	function setSyncProdName()
	{
		// TODO: Implement setSyncProdName() method.
	}

	function setSyncIdDev()
	{
		//var_dump($this->shopItem());

		//echo $this->shopItem['Brand'] . "<br />";

	}

	function setSyncCategoryText()
	{
		// TODO: Implement setSyncCategoryText() method.
	}

	function setSyncUrl()
	{
		// TODO: Implement setSyncUrl() method.
	}

	function setSyncProdImgSourceArray()
	{
		// TODO: Implement setSyncProdImgSourceArray() method.
	}

	function setSyncProdAccessorySourceArray()
	{
		// TODO: Implement setSyncProdAccessorySourceArray() method.
	}

	function setSyncItemsCodeProduct()
	{
		// TODO: Implement setSyncItemsCodeProduct() method.
	}

	function setSyncItemsCodeEan()
	{
		// TODO: Implement setSyncItemsCodeEan() method.
	}

	function setSyncItemsPriceStandard()
	{
		// TODO: Implement setSyncItemsPriceStandard() method.
	}

	function setSyncItemsPriceAction()
	{
		// TODO: Implement setSyncItemsPriceAction() method.
	}

	function setSyncItemsAvailabilityCount()
	{
		// TODO: Implement setSyncItemsAvailabilityCount() method.
	}

	function setSyncProdWeight()
	{
		// TODO: Implement setSyncProdWeight() method.
	}
}
<?php namespace Authority\Runner\Task\Store;

class RunGarland extends AbstractRunDev implements iItem
{
	function __construct($shop_item, $record_id)
	{
		parent::__construct($shop_item, $record_id);
	}

	public function setSyncCategoryText()
	{
		(!empty($this->shopItem['SKUPINA']) ? $this->syncCategoryText = (string)$this->shopItem['SKUPINA'] : NULL);
	}

	public function setSyncIdDev()
	{
		$this->syncIdDev = $this->analyseIdDev($this->shopItem['DRUH']);
	}

	private function analyseIdDev($dev_name)
	{
		switch ($dev_name) {
			case 'AgriFab' :
				return 702;
			case 'Arnold (MTD)' :
				return 704;
			case 'Biocin' :
				return 706;
			case 'Britech' :
				return 708;
			case '100 Cub Cadet' :
				return 710;
			case 'DWT - naradi' :
				return 712;
			case 'ELPUMPS' :
				return 714;
			case 'GTM' :
				return 716;
			case 'Greenworks' :
				return 718;
			case 'Homelite' :
				return 720;
			case 'Kity' :
				return 722;
			case 'Marunaka' :
				return 724;
			case 'Michelin' :
				return 726;
			case '616 MTD' :
			case '600 MTD Europe Silver Line' :
			case '678 MTD Europe' :
				return 728;
			case 'Palram' :
				return 730;
			case 'RYOBI - naradi' :
			case 'RYOBI - zahrada' :
				return 732;
			case 'Riwall' :
			case 'Riwall PRO' :
				return 734;
			case 'Sandri Garden' :
				return 736;
			case 'Scheppach' :
			case 'Scheppach classic' :
			case 'Scheppach special edition' :
				return 738;
//			case 'Silky' : BEREME OD IGM
//				return 0;
			case 'TurfMaster' :
				return 742;
			case 'Woodster' :
				return 744;
			default :
				return 0;
		}

	}

	public function setSyncItemsAvailabilityCount()
	{
		if (isset($this->shopItem['STAVVOLNY']) && intval($this->shopItem['STAVVOLNY']) > 0) {
			$this->syncItemsAvailabilityCount = intval($this->shopItem['STAVVOLNY']);
		}
	}

	public function setSyncItemsCodeEan()
	{
		(!empty($this->shopItem['EAN']) ? $this->syncItemsCodeEan = (string)$this->shopItem['EAN'] : NULL);
	}

	public function setSyncItemsCodeProduct()
	{
		(!empty($this->shopItem['ID']) ? $this->syncItemsCodeProduct = (string)$this->shopItem['ID'] : NULL);
	}

	public function setSyncItemsPriceStandard()
	{
		$prodej6 = doubleval($this->shopItem['PRODEJ6']) * self::DPH;
		if ($prodej6 > 0) {
			$this->syncItemsPriceStandard = $prodej6;
		} else {
			$this->syncItemsPriceStandard = doubleval($this->shopItem['PRODEJ_DPH']);
		}
	}

	public function setSyncProdName()
	{
		(!empty($this->shopItem['NAZEV']) ? $this->syncProdName = (string)$this->shopItem['NAZEV'] : NULL);
	}

	public function setSyncProdDesc()
	{
		(!empty($this->shopItem['POPIS']) ? $this->syncProdDesc = (string)$this->shopItem['POPIS'] : NULL);
	}

	function setSyncProdImgSourceArray()
	{
		(!empty($this->shopItem['NAHLED_BIG']) ? $this->syncProdImgSourceArray = (array)$this->shopItem['NAHLED_BIG'] : NULL);
	}

	function setSyncUrl()
	{
		// TODO: Implement setSyncUrl() method.
	}

	function setSyncProdAccessorySourceArray()
	{
		// TODO: Implement setSyncProdAccessorySourceArray() method.
	}

	function setSyncItemsPriceAction()
	{
		// TODO: Implement setSyncItemsPriceAction() method.
	}

	function setSyncProdWeight()
	{
		// TODO: Implement setSyncProdWeight() method.
	}
}
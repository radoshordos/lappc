<?php namespace Authority\Runner\Task\Store;

class RunProma extends AbstractRunDev implements iItem
{
	const ROOT = 'SHOP';

	function __construct($shop_item, $record_id)
	{
		parent::__construct($shop_item, $record_id);
	}

	private function analyseIdDev($dev_name)
	{
		switch ($dev_name) {
			case 'FERM' :
				return 36;
			case 'WORX' :
			case 'WORX Garden' :
				return 170;
			case 'PROMA' :
				return 35;
			default :
				return 0;
		}
	}

	public function setSyncIdDev()
	{
		$this->syncIdDev = $this->analyseIdDev(isset($this->shopItem['BRAND']) ? $this->shopItem['BRAND'] : "no_dev");
	}

	function setSyncProdName()
	{
		if (isset($this->shopItem['PRODUCT'])) {
			$this->syncProdName = (string)trim($this->shopItem['PRODUCT']);
		}
	}

	function setSyncItemsCodeProduct()
	{
		(!empty($this->shopItem['ORDER_NR']) ? $this->syncItemsCodeProduct = (string)trim($this->shopItem['ORDER_NR']) : NULL);
	}

	public function setSyncItemsCodeEan()
	{
		if (isset($this->shopItem['EAN'])) {
			$this->syncItemsCodeEan = (string)trim($this->shopItem['EAN']);
		}
	}

	public function setSyncItemsPriceStandard()
	{
		(!empty($this->shopItem['PRICE']) ? $this->syncItemsPriceStandard = round(doubleval($this->shopItem['PRICE'])) : NULL);
	}

	public function setSyncItemsAvailabilityCount()
	{
		if (isset($this->shopItem['AVAILABLE'])) {
			$this->syncItemsAvailabilityCount = intval($this->shopItem['AVAILABLE']);
		}
	}

	public function setSyncCategoryText()
	{
		if (isset($this->shopItem['CATEGORY'])) {
			$this->syncCategoryText = (string)$this->shopItem['CATEGORY'];
		}
	}

	function setSyncWarranty()
	{
		if (isset($this->shopItem['GUARANTEE_MONTHS'])) {
			$this->syncWarranty = intval($this->shopItem['GUARANTEE_MONTHS']);
		}
	}

	function setSyncProdDesc()
	{
		// TODO: Implement setSyncProdDesc() method.
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

	function setSyncItemsPriceAction()
	{
		// TODO: Implement setSyncItemsPriceAction() method.
	}

	function setSyncProdWeight()
	{
		// TODO: Implement setSyncProdWeight() method.
	}
}

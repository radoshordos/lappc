<?php namespace Authority\Runner\Task\Store;

class RunPapaspol extends AbstractRunDev implements iItem
{

	public function setSyncIdDev()
	{
		if (isset($this->shopItem["MANUFACTURER"])) {
			$this->syncIdDev = $this->analyseIdDev($this->shopItem['MANUFACTURER']);
		}
	}

	private function analyseIdDev($dev_name)
	{
		switch ($dev_name) {
			case 'CHC';
			case 'GeoFennel';
			case 'Glunz';
			case 'Goecke / Geodigital';
			case 'Leica';
			case 'MIT';
			case 'Matai';
			case 'Nedo';
			case 'Nestle';
			case 'QBL';
			case 'Rabo';
			case 'Rauch';
			case 'Seba KMT';
			case 'Soppec';
			case 'Spectra Precision';
			case 'Theis NEW';
			case 'Topcon';
			case 'Trimble';
			case 'Weiss';
			case 'Zorn';
				return 902;
			default :
				return 0;
		}
	}

	function setSyncProdDesc()
	{
		if (isset($this->shopItem['DESCRIPTION'])) {
			$this->syncProdDesc = (string)$this->shopItem['DESCRIPTION'];
		}
	}

	function setSyncProdName()
	{
		if (isset($this->shopItem['PRODUCT'])) {
			$this->syncProdName = (string)$this->shopItem['PRODUCT'];
		}
	}

	function setSyncCategoryText()
	{
		if (isset($this->shopItem['CATEGORYTEXT'])) {
			$this->syncCategoryText = (string)$this->shopItem['CATEGORYTEXT'];
		}
	}

	function setSyncUrl()
	{
		if (isset($this->shopItem['URL'])) {
			$this->syncUrl = (string)$this->shopItem['URL'];
		}
	}

	function setSyncProdImgSourceArray()
	{
		if (isset($this->shopItem['IMGURL'])) {
			$this->syncProdImgSourceArray = (array)$this->shopItem['IMGURL'];
		}
	}

	public function setSyncItemsPriceStandard()
	{
		if (isset($this->shopItem['PRICE'])) {
			$this->syncItemsPriceStandard = round(doubleval($this->shopItem['PRICE'] * self::DPH));
		}
	}

	function setSyncProdAccessorySourceArray()
	{
		// TODO: Implement setSyncProdAccessorySourceArray() method.
	}

	function setSyncProdFileSourceArray()
	{
		// TODO: Implement setSyncProdFileSourceArray() method.
	}

	function setSyncItemsCodeProduct()
	{
		// TODO: Implement setSyncItemsCodeProduct() method.
	}

	function setSyncItemsCodeEan()
	{
		// TODO: Implement setSyncItemsCodeEan() method.
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

	function setSyncWarranty()
	{
		// TODO: Implement setSyncWarranty() method.
	}

}
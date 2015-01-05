<?php namespace Authority\Runner\Task\Store;

class RunIgm extends AbstractRunDev implements iItem
{
	const ROOT = 'SHOP';

	function __construct($shop_item, $record_id)
	{
		parent::__construct($shop_item, $record_id);
	}

	private function analyseIdDev($dev_name)
	{
		switch ($dev_name) {
			case 'IGM Basic Line' :
			case 'IGM Expert Line' :
			case 'IGM Professional Tools' :
			case 'IGM Profi Line' :
				return 800;
			case 'CMT Orange Tools' :
				return 802;
			case 'IGM Fachmann Tools' :
				return 804;
			case 'JET' :
				return 806;
			case 'Silky' :
				return 808;
			case 'Titebond' :
				return 810;
			case 'Uvex' :
				return 812;
			default :
				return 0;
		}
	}

	public function setSyncIdDev()
	{
		$this->syncIdDev = $this->analyseIdDev($this->shopItem['MANUFACTURER']);
	}

	function setSyncProdName()
	{
		(!empty($this->shopItem['PRODUCTNAME']) ? $this->syncProdName = (string)trim($this->shopItem['PRODUCTNAME']) : NULL);
	}

	public function setSyncProdDesc()
	{
		(!empty($this->shopItem['DESCRIPTION']) ? $this->syncProdDesc = (string)trim($this->shopItem['DESCRIPTION']) : NULL);
	}

	function setSyncItemsCodeProduct()
	{
		(!empty($this->shopItem['PRODUCTNO']) ? $this->syncItemsCodeProduct = (string)trim($this->shopItem['PRODUCTNO']) : NULL);
	}

	public function setSyncItemsCodeEan()
	{
		(!empty($this->shopItem['EAN']) ? $this->syncItemsCodeEan = (string)trim($this->shopItem['EAN']) : NULL);
	}

	public function setSyncItemsPriceStandard()
	{
		(!empty($this->shopItem['PRODUCTPRICE']) ? $this->syncItemsPriceStandard = doubleval($this->shopItem['PRODUCTPRICE']) : NULL);
	}

	function setSyncItemsPriceAction()
	{
		(!empty($this->shopItem['PRODUCTACTIONPRICE']) ? $this->syncItemsPriceAction = doubleval($this->shopItem['PRODUCTACTIONPRICE']) : NULL);
	}

	function setSyncProdWeight()
	{
		if (isset($this->shopItem['MAINUNITWEIGHT'])) {
			$this->syncProdWeight = round(floatval(str_replace(",", ".", $this->shopItem['MAINUNITWEIGHT'])), 2);
		}
	}

	public function setSyncCategoryText()
	{
		(!empty($this->shopItem['CATEGORY']) ? $this->syncCategoryText = $this->shopItem['CATEGORY'] : NULL);
	}

	function setSyncProdImgSourceArray()
	{
		if (!empty($this->shopItem['PRODUCTPICTURES'])) {
			$ai = new \ArrayIterator();
			$pp = (array)$this->shopItem['PRODUCTPICTURES'];

			if (count($pp) > 0) {
				foreach ($pp as $val) {
					$ai->append($val);
				}
			}
			return $this->syncProdImgSourceArray = $ai->getArrayCopy();
		}
	}

	function setSyncUrl()
	{
		// TODO: Implement setSyncUrl() method.
	}

	function setSyncProdAccessorySourceArray()
	{
		// TODO: Implement setSyncProdAccessorySourceArray() method.
	}

	function setSyncWarranty()
	{
		// TODO: Implement setSyncWarranty() method.
	}

	function setSyncItemsAvailabilityCount()
	{
		// TODO: Implement setSyncItemsAvailabilityCount() method.
	}

	function setSyncProdFileSourceArray()
	{
		// TODO: Implement setSyncProdFileSourceArray() method.
	}
}
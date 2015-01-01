<?php namespace Authority\Runner\Task\Store;

class RunMakita extends AbstractRunDev implements iItem
{
	const ROOT = 'SHOP';

	function __construct($shop_item, $record_id)
	{
		parent::__construct($shop_item, $record_id);
	}

	private function analyseIdDev($dev_name)
	{
		return 5;
		/*
		switch ($dev_name) {
			case 'Silky' :
				return 808;
			case 'Titebond' :
				return 810;
			case 'Uvex' :
				return 812;
			default :
				return 0;
		}
		*/
	}

	function setSyncProdName()
	{
		(!empty($this->shopItem['PRODUCT']) ? $this->syncProdName = (string)$this->shopItem['PRODUCT'] : NULL);
	}

	function setSyncCommonGroup()
	{
		if (!empty($this->shopItem['CATEGORYTEXT'])) {
			$this->syncCategoryText = (string)$this->shopItem['CATEGORYTEXT'];
		} else if (!empty($this->shopItem['SORTIMENT1ID'])) {
			$this->syncCategoryText = (string)$this->shopItem['SORTIMENT1ID'];
		}
	}

	function setSyncItemsCodeProduct()
	{
		(!empty($this->shopItem['ITEM_ID']) ? $this->syncItemsCodeProduct = (string)$this->shopItem['ITEM_ID'] : NULL);
	}

	function setSyncUrl()
	{
		(!empty($this->shopItem['URL']) ? $this->syncUrl = (string)$this->shopItem['URL'] : NULL);
	}

	function setSyncProdImgSourceArray()
	{
		if (!empty($this->shopItem['IMGURL'] || !empty($this->shopItem['IMGURL_ALTERNATIVE']))) {
			$ai = new \ArrayIterator();

			if (!empty($this->shopItem['IMGURL']) && $this->shopItem['IMGURL'] != 'http://templates/makita/grafika/telo/bez-nahledu.png') {
				$ai->append($this->shopItem['IMGURL']);
			}

			if (!empty($this->shopItem['IMGURL_ALTERNATIVE'])) {
				if (is_array($this->shopItem['IMGURL_ALTERNATIVE'])) {
					foreach ($this->shopItem['IMGURL_ALTERNATIVE'] as $val) {
						$ai->append($val);
					}
				} else {
					$ai->append($this->shopItem['IMGURL_ALTERNATIVE']);
				}
			}
			$this->syncProdImgSourceArray = $ai->getArrayCopy();
		}
	}

	function setSyncProdDesc()
	{
		(!empty($this->shopItem['PRODUCT']) ? $this->syncProdDesc = (string)$this->shopItem['PRODUCT'] : NULL);
	}

	function setSyncIdDev()
	{
		$this->syncIdDev = $this->analyseIdDev('unknown');
	}

	function setSyncCategoryText()
	{
		(!empty($this->shopItem['CATEGORYTEXT']) ? $this->syncCategoryText = (string)$this->shopItem['CATEGORYTEXT'] : NULL);
	}

	function setSyncProdAccessorySourceArray()
	{
		if (!empty($this->shopItem['ACCESSORY'])) {
			$ai = new \ArrayIterator();

			if (is_array($this->shopItem['ACCESSORY'])) {
				foreach ($this->shopItem['ACCESSORY'] as $val) {
					$ai->append($val);
				}
			} else {
				$ai->append($this->shopItem['ACCESSORY']);
			}

			$this->syncProdAccessorySourceArray = $ai->getArrayCopy();
		}
	}

	function setSyncItemsCodeEan()
	{
		$this->syncItemsCodeEan = NULL;
	}

	function setSyncItemsPriceStandard()
	{
		(!empty($this->shopItem['RECOMMENDED_PRICE_VAT']) ? $this->syncItemsPriceStandard = floatval($this->shopItem['RECOMMENDED_PRICE_VAT']) : NULL);
	}

	function setSyncItemsPriceAction()
	{
		$this->syncItemsPriceAction = NULL;
	}

	function setSyncItemsAvailabilityCount()
	{
		if (!empty($this->shopItem['ONSTOCK']) && $this->shopItem['ONSTOCK'] == 'ANO') {
			$this->syncItemsAvailabilityCount = 1;
		} else {
			$this->syncItemsAvailabilityCount = 0;
		}
	}

	function setSyncProdWeight()
	{
		$this->syncProdWeight = 0;
	}
}
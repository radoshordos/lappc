<?php namespace Authority\Mapper;

use Authority\Eloquent\Forex;

class ViewProdWorker extends ViewProdModel
{
	CONST DIR_MEDIA = '/web/naradi/';

	private $price;
	private $forex_db;

	public function __construct($row)
	{
		$this->price = $this->calculatePrice();
		$this->forex_db = Forex::all()->toArray();
	}

	public function getPrice()
	{
		return $this->price;
	}

	private function calculatePrice()
	{
		if ($this->getProdModeId() == 4) {
			return $this->getAkcePrice();
		} else {
			return $this->getProdPrice();
		}
	}

	public function priceFormatCurrencyWith()
	{
		return number_format($this->getPrice(), $this->forex_db[$this->getProdForexId() - 1]['round_with'], ',', ' ') . " " . $this->forex_db[$this->getProdForexId() - 1]['currency'];
	}

	public function priceFormatCurrencyWithout()
	{
		return number_format($this->getPrice(), $this->forex_db[$this->getProdForexId() - 1]['round_without'], ',', ' ') . " " . $this->forex_db[$this->getProdForexId() - 1]['currency'];
	}

	public function priceFormatWithoutDph()
	{
		return number_format($this->getPrice() - ($this->getPrice() * round(($this->getProdDphId() / (100 + $this->getProdDphId())), 4)), $this->forex_db[$this->getProdForexId() - 1]['round_without'], ',', ' ') . " " . $this->forex_db[$this->getProdForexId() - 1]['currency']; // § 37 Zákon č. 235/2004 Sb.
	}

	public function getProdImgNormalWithDir()
	{
		return self::DIR_MEDIA . $this->getTreeAbsolute() . '/' . $this->getProdImgNormal();
	}

	public function getProdUrl()
	{
		return '/' . $this->getTreeAbsolute() . '/' . $this->getProdAlias();
	}

	public function getProdNameWithBonus()
	{
		if (!empty($this->getAkceTemplateBonusTitle())) {
			return $this->getProdName() . ' + ' . $this->getAkceTemplateBonusTitle();
		}
		return $this->getProdName();
	}
}
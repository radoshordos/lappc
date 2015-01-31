<?php namespace Authority\Mapper;

class CreateProdModel
{
	private $prod_tree_id;
	private $prod_dev_id;
	private $prod_mode_id = 3;
	private $prod_sale_id;
	private $prod_difference_id;
	private $prod_warranty_id;
	private $prod_forex_id;
	private $prod_dph_id = 21;
	private $prod_price;
	private $prod_name;
	private $prod_desc;
	private $prod_transport_weight = 0.1;
	private $prod_img_big;
	private $prod_img_normal;
	private $items_availability_id;
	private $items_code_prod;
	private $items_code_ean;
	private $prod_description_data_title1 = 701;
	private $prod_description_data_title2;
	private $prod_description_data_title3;
	private $prod_description_data_input1;
	private $prod_description_data_input2;
	private $prod_description_data_input3;
	private $prod_picture_img_big;
	private $prod_picture_img_normal;

	public function getProdDevId()
	{
		return $this->prod_dev_id;
	}

	public function setProdDevId($prod_dev_id)
	{
		$this->prod_dev_id = $prod_dev_id;
	}

	public function getProdModeId()
	{
		return $this->prod_mode_id;
	}

	public function getProdDphId()
	{
		return $this->prod_dph_id;
	}

	public function getProdPrice()
	{
		return $this->prod_price;
	}

	public function setProdPrice($prod_price)
	{
		$this->prod_price = round($prod_price);
	}

	public function getProdName()
	{
		return $this->prod_name;
	}

	public function setProdName($prod_name)
	{
		$this->prod_name = $prod_name;
	}

	public function getProdDesc()
	{
		return $this->prod_desc;
	}

	public function setProdDesc($prod_desc)
	{
		$this->prod_desc = $prod_desc;
	}

	public function getItemsCodeProd()
	{
		return $this->items_code_prod;
	}

	public function setItemsCodeProd($items_code_prod)
	{
		$this->items_code_prod = $items_code_prod;
	}

	public function getItemsCodeEan()
	{
		return $this->items_code_ean;
	}

	public function setItemsCodeEan($items_code_ean)
	{
		$this->items_code_ean = $items_code_ean;
	}

	public function getProdTransportWeight()
	{
		return $this->prod_transport_weight;
	}

	public function setProdTransportWeight($prod_transport_weight)
	{
		if (doubleval($prod_transport_weight) >= 0.01) {
			$this->prod_transport_weight = number_format(doubleval($prod_transport_weight), 2, '.', '');
		}
	}

	public function getProdDescriptionDataTitle1()
	{
		return $this->prod_description_data_title1;
	}

	public function setProdDescriptionDataTitle1($prod_description_data_title1)
	{
		$this->prod_description_data_title1 = $prod_description_data_title1;
	}

	public function getProdDescriptionDataTitle2()
	{
		return $this->prod_description_data_title2;
	}

	public function setProdDescriptionDataTitle2($prod_description_data_title2)
	{
		$this->prod_description_data_title2 = $prod_description_data_title2;
	}

	public function getProdDescriptionDataTitle3()
	{
		return $this->prod_description_data_title3;
	}

	public function setProdDescriptionDataTitle3($prod_description_data_title3)
	{
		$this->prod_description_data_title3 = $prod_description_data_title3;
	}

	public function getProdDescriptionDataInput1()
	{
		return $this->prod_description_data_input1;
	}

	public function setProdDescriptionDataInput1($prod_description_data_input1)
	{
		$this->prod_description_data_input1 = $prod_description_data_input1;
	}

	public function getProdDescriptionDataInput2()
	{
		return $this->prod_description_data_input2;
	}

	public function setProdDescriptionDataInput2($prod_description_data_input2)
	{
		$this->prod_description_data_input2 = $prod_description_data_input2;
	}

	public function getProdDescriptionDataInput3()
	{
		return $this->prod_description_data_input3;
	}

	public function setProdDescriptionDataInput3($prod_description_data_input3)
	{
		$this->prod_description_data_input3 = $prod_description_data_input3;
	}
}
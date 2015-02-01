<?php namespace Authority\Mapper;

class CreateProdModel
{
	private $prod_tree_id;
	private $prod_dev_id;
	private $prod_mode_id = 3;
	private $prod_sale_id;
	private $prod_action_sale_id;
	private $prod_warranty_id;
	private $prod_forex_id;
	private $prod_dph_id = 21;
	private $prod_price;
	private $prod_name;
	private $prod_desc;
	private $prod_transport_weight = 0.1;
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
	private $prod_picture01;
	private $prod_picture02;
	private $prod_picture03;
	private $prod_picture04;
	private $prod_picture05;
	private $prod_picture06;
	private $prod_picture07;
	private $prod_picture08;
	private $prod_picture09;
	private $prod_picture10;
	private $prod_picture11;
	private $prod_picture12;

	public function getAll()
	{
		return $this;
	}

	public function getProdTreeId()
	{
		return $this->prod_tree_id;
	}

	public function setProdTreeId($prod_tree_id)
	{
		$this->prod_tree_id = $prod_tree_id;
	}

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

	public function getProdSaleId()
	{
		return $this->prod_sale_id;
	}

	public function setProdSaleId($prod_sale_id)
	{
		$this->prod_sale_id = $prod_sale_id;
	}

	public function getProdActionSaleId()
	{
		return $this->prod_action_sale_id;
	}

	public function setProdActionSaleId($prod_action_sale_id)
	{
		$this->prod_action_sale_id = $prod_action_sale_id;
	}

	public function getProdDphId()
	{
		return $this->prod_dph_id;
	}

	public function getProdWarrantyId()
	{
		return $this->prod_warranty_id;
	}

	public function getProdForexId()
	{
		return $this->prod_forex_id;
	}

	public function setProdForexId($prod_forex_id)
	{
		$this->prod_forex_id = $prod_forex_id;
	}

	public function setProdWarrantyId($prod_warranty_id)
	{
		$this->prod_warranty_id = $prod_warranty_id;
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

	public function getItemsAvailabilityId()
	{
		return $this->items_availability_id;
	}

	public function setItemsAvailabilityId($items_availability_id)
	{
		$this->items_availability_id = $items_availability_id;
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

	public function getProdPictureImgBig()
	{
		return $this->prod_picture_img_big;
	}

	public function setProdPictureImgBig($prod_picture_img_big)
	{
		$this->prod_picture_img_big = $prod_picture_img_big;
	}

	public function getProdPicture01()
	{
		return $this->prod_picture01;
	}

	public function setProdPicture01($prod_picture01)
	{
		$this->prod_picture01 = $prod_picture01;
	}

	public function getProdPicture02()
	{
		return $this->prod_picture02;
	}

	public function setProdPicture02($prod_picture02)
	{
		$this->prod_picture02 = $prod_picture02;
	}

	public function getProdPicture03()
	{
		return $this->prod_picture03;
	}

	public function setProdPicture03($prod_picture03)
	{
		$this->prod_picture03 = $prod_picture03;
	}

	public function getProdPicture04()
	{
		return $this->prod_picture04;
	}

	public function setProdPicture04($prod_picture04)
	{
		$this->prod_picture04 = $prod_picture04;
	}

	public function getProdPicture05()
	{
		return $this->prod_picture05;
	}

	public function setProdPicture05($prod_picture05)
	{
		$this->prod_picture05 = $prod_picture05;
	}

	public function getProdPicture06()
	{
		return $this->prod_picture06;
	}

	public function setProdPicture06($prod_picture06)
	{
		$this->prod_picture06 = $prod_picture06;
	}

	public function getProdPicture07()
	{
		return $this->prod_picture07;
	}

	public function setProdPicture07($prod_picture07)
	{
		$this->prod_picture07 = $prod_picture07;
	}

	public function getProdPicture08()
	{
		return $this->prod_picture08;
	}

	public function setProdPicture08($prod_picture08)
	{
		$this->prod_picture08 = $prod_picture08;
	}

	public function getProdPicture09()
	{
		return $this->prod_picture09;
	}

	public function setProdPicture09($prod_picture09)
	{
		$this->prod_picture09 = $prod_picture09;
	}

	public function getProdPicture10()
	{
		return $this->prod_picture10;
	}

	public function setProdPicture10($prod_picture10)
	{
		$this->prod_picture10 = $prod_picture10;
	}

	public function getProdPicture11()
	{
		return $this->prod_picture11;
	}

	public function setProdPicture11($prod_picture11)
	{
		$this->prod_picture11 = $prod_picture11;
	}

	public function getProdPicture12()
	{
		return $this->prod_picture12;
	}

	public function setProdPicture12($prod_picture12)
	{
		$this->prod_picture12 = $prod_picture12;
	}
}
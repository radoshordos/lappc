<?php namespace Authority\Mapper;

abstract class ViewProdModel
{
	private $prod_id;
	private $prod_mode_id;
	private $prod_sale_id;
	private $prod_difference_id;
	private $prod_warranty_id;
	private $prod_forex_id;
	private $prod_dph_id;
	private $prod_price;
	private $prod_alias;
	private $prod_name;
	private $prod_desc;
	private $prod_storeroom;
	private $prod_ic_all;
	private $prod_ic_visible;
	private $prod_ic_availability_diff_visible;
	private $prod_search_alias;
	private $prod_search_codes;
	private $prod_search_sell;
	private $prod_img_normal;
	private $prod_img_big;
	private $prod_created_at;
	private $prod_updated_at;
	private $prod_warranty_name;
	private $prod_sale_name;
	private $prod_sale_multiple;
	private $tree_id;
	private $tree_name;
	private $tree_absolute;
	private $tree_group_id;
	private $dev_id;
	private $dev_name;
	private $dev_alias;
	private $akce_price;
	private $akce_sale_multiple;
	private $akce_template_id;
	private $akce_template_bonus_title;
	private $akce_minitext_name;

	/**
	 * @return mixed
	 */
	public function getProdId()
	{
		return $this->prod_id;
	}

	/**
	 * @param mixed $prod_id
	 */
	public function setProdId($prod_id)
	{
		$this->prod_id = $prod_id;
	}

	/**
	 * @return mixed
	 */
	public function getProdModeId()
	{
		return $this->prod_mode_id;
	}

	/**
	 * @param mixed $prod_mode_id
	 */
	public function setProdModeId($prod_mode_id)
	{
		$this->prod_mode_id = $prod_mode_id;
	}

	/**
	 * @return mixed
	 */
	public function getProdSaleId()
	{
		return $this->prod_sale_id;
	}

	/**
	 * @param mixed $prod_sale_id
	 */
	public function setProdSaleId($prod_sale_id)
	{
		$this->prod_sale_id = $prod_sale_id;
	}

	/**
	 * @return mixed
	 */
	public function getProdDifferenceId()
	{
		return $this->prod_difference_id;
	}

	/**
	 * @param mixed $prod_difference_id
	 */
	public function setProdDifferenceId($prod_difference_id)
	{
		$this->prod_difference_id = $prod_difference_id;
	}

	/**
	 * @return mixed
	 */
	public function getProdWarrantyId()
	{
		return $this->prod_warranty_id;
	}

	/**
	 * @param mixed $prod_warranty_id
	 */
	public function setProdWarrantyId($prod_warranty_id)
	{
		$this->prod_warranty_id = $prod_warranty_id;
	}

	/**
	 * @return mixed
	 */
	public function getProdForexId()
	{
		return $this->prod_forex_id;
	}

	/**
	 * @param mixed $prod_forex_id
	 */
	public function setProdForexId($prod_forex_id)
	{
		$this->prod_forex_id = $prod_forex_id;
	}

	/**
	 * @return mixed
	 */
	public function getProdDphId()
	{
		return $this->prod_dph_id;
	}

	/**
	 * @param mixed $prod_dph_id
	 */
	public function setProdDphId($prod_dph_id)
	{
		$this->prod_dph_id = $prod_dph_id;
	}

	/**
	 * @return mixed
	 */
	public function getProdPrice()
	{
		return $this->prod_price;
	}

	/**
	 * @param mixed $prod_price
	 */
	public function setProdPrice($prod_price)
	{
		$this->prod_price = $prod_price;
	}

	/**
	 * @return mixed
	 */
	public function getProdAlias()
	{
		return $this->prod_alias;
	}

	/**
	 * @param mixed $prod_alias
	 */
	public function setProdAlias($prod_alias)
	{
		$this->prod_alias = $prod_alias;
	}

	/**
	 * @return mixed
	 */
	public function getProdName()
	{
		return $this->prod_name;
	}

	/**
	 * @param mixed $prod_name
	 */
	public function setProdName($prod_name)
	{
		$this->prod_name = $prod_name;
	}

	/**
	 * @return mixed
	 */
	public function getProdDesc()
	{
		return $this->prod_desc;
	}

	/**
	 * @param mixed $prod_desc
	 */
	public function setProdDesc($prod_desc)
	{
		$this->prod_desc = $prod_desc;
	}

	/**
	 * @return mixed
	 */
	public function getProdStoreroom()
	{
		return $this->prod_storeroom;
	}

	/**
	 * @param mixed $prod_storeroom
	 */
	public function setProdStoreroom($prod_storeroom)
	{
		$this->prod_storeroom = $prod_storeroom;
	}

	/**
	 * @return mixed
	 */
	public function getProdIcAll()
	{
		return $this->prod_ic_all;
	}

	/**
	 * @param mixed $prod_ic_all
	 */
	public function setProdIcAll($prod_ic_all)
	{
		$this->prod_ic_all = $prod_ic_all;
	}

	/**
	 * @return mixed
	 */
	public function getProdIcVisible()
	{
		return $this->prod_ic_visible;
	}

	/**
	 * @param mixed $prod_ic_visible
	 */
	public function setProdIcVisible($prod_ic_visible)
	{
		$this->prod_ic_visible = $prod_ic_visible;
	}

	/**
	 * @return mixed
	 */
	public function getProdIcAvailabilityDiffVisible()
	{
		return $this->prod_ic_availability_diff_visible;
	}

	/**
	 * @param mixed $prod_ic_availability_diff_visible
	 */
	public function setProdIcAvailabilityDiffVisible($prod_ic_availability_diff_visible)
	{
		$this->prod_ic_availability_diff_visible = $prod_ic_availability_diff_visible;
	}

	/**
	 * @return mixed
	 */
	public function getProdSearchAlias()
	{
		return $this->prod_search_alias;
	}

	/**
	 * @param mixed $prod_search_alias
	 */
	public function setProdSearchAlias($prod_search_alias)
	{
		$this->prod_search_alias = $prod_search_alias;
	}

	/**
	 * @return mixed
	 */
	public function getProdSearchCodes()
	{
		return $this->prod_search_codes;
	}

	/**
	 * @param mixed $prod_search_codes
	 */
	public function setProdSearchCodes($prod_search_codes)
	{
		$this->prod_search_codes = $prod_search_codes;
	}

	/**
	 * @return mixed
	 */
	public function getProdSearchSell()
	{
		return $this->prod_search_sell;
	}

	/**
	 * @param mixed $prod_search_sell
	 */
	public function setProdSearchSell($prod_search_sell)
	{
		$this->prod_search_sell = $prod_search_sell;
	}

	/**
	 * @return mixed
	 */
	public function getProdImgNormal()
	{
		return $this->prod_img_normal;
	}

	/**
	 * @param mixed $prod_img_normal
	 */
	public function setProdImgNormal($prod_img_normal)
	{
		$this->prod_img_normal = $prod_img_normal;
	}

	/**
	 * @return mixed
	 */
	public function getProdImgBig()
	{
		return $this->prod_img_big;
	}

	/**
	 * @param mixed $prod_img_big
	 */
	public function setProdImgBig($prod_img_big)
	{
		$this->prod_img_big = $prod_img_big;
	}

	/**
	 * @return mixed
	 */
	public function getProdCreatedAt()
	{
		return $this->prod_created_at;
	}

	/**
	 * @param mixed $prod_created_at
	 */
	public function setProdCreatedAt($prod_created_at)
	{
		$this->prod_created_at = $prod_created_at;
	}

	/**
	 * @return mixed
	 */
	public function getProdUpdatedAt()
	{
		return $this->prod_updated_at;
	}

	/**
	 * @param mixed $prod_updated_at
	 */
	public function setProdUpdatedAt($prod_updated_at)
	{
		$this->prod_updated_at = $prod_updated_at;
	}

	/**
	 * @return mixed
	 */
	public function getProdWarrantyName()
	{
		return $this->prod_warranty_name;
	}

	/**
	 * @param mixed $prod_warranty_name
	 */
	public function setProdWarrantyName($prod_warranty_name)
	{
		$this->prod_warranty_name = $prod_warranty_name;
	}

	/**
	 * @return mixed
	 */
	public function getProdSaleName()
	{
		return $this->prod_sale_name;
	}

	/**
	 * @param mixed $prod_sale_name
	 */
	public function setProdSaleName($prod_sale_name)
	{
		$this->prod_sale_name = $prod_sale_name;
	}

	/**
	 * @return mixed
	 */
	public function getProdSaleMultiple()
	{
		return $this->prod_sale_multiple;
	}

	/**
	 * @param mixed $prod_sale_multiple
	 */
	public function setProdSaleMultiple($prod_sale_multiple)
	{
		$this->prod_sale_multiple = $prod_sale_multiple;
	}

	/**
	 * @return mixed
	 */
	public function getTreeId()
	{
		return $this->tree_id;
	}

	/**
	 * @param mixed $tree_id
	 */
	public function setTreeId($tree_id)
	{
		$this->tree_id = $tree_id;
	}

	/**
	 * @return mixed
	 */
	public function getTreeName()
	{
		return $this->tree_name;
	}

	/**
	 * @param mixed $tree_name
	 */
	public function setTreeName($tree_name)
	{
		$this->tree_name = $tree_name;
	}

	/**
	 * @return mixed
	 */
	public function getTreeAbsolute()
	{
		return $this->tree_absolute;
	}

	/**
	 * @param mixed $tree_absolute
	 */
	public function setTreeAbsolute($tree_absolute)
	{
		$this->tree_absolute = $tree_absolute;
	}

	/**
	 * @return mixed
	 */
	public function getTreeGroupId()
	{
		return $this->tree_group_id;
	}

	/**
	 * @param mixed $tree_group_id
	 */
	public function setTreeGroupId($tree_group_id)
	{
		$this->tree_group_id = $tree_group_id;
	}

	/**
	 * @return mixed
	 */
	public function getDevId()
	{
		return $this->dev_id;
	}

	/**
	 * @param mixed $dev_id
	 */
	public function setDevId($dev_id)
	{
		$this->dev_id = $dev_id;
	}

	/**
	 * @return mixed
	 */
	public function getDevName()
	{
		return $this->dev_name;
	}

	/**
	 * @param mixed $dev_name
	 */
	public function setDevName($dev_name)
	{
		$this->dev_name = $dev_name;
	}

	/**
	 * @return mixed
	 */
	public function getDevAlias()
	{
		return $this->dev_alias;
	}

	/**
	 * @param mixed $dev_alias
	 */
	public function setDevAlias($dev_alias)
	{
		$this->dev_alias = $dev_alias;
	}

	/**
	 * @return mixed
	 */
	public function getAkcePrice()
	{
		return $this->akce_price;
	}

	/**
	 * @param mixed $akce_price
	 */
	public function setAkcePrice($akce_price)
	{
		$this->akce_price = $akce_price;
	}

	/**
	 * @return mixed
	 */
	public function getAkceSaleMultiple()
	{
		return $this->akce_sale_multiple;
	}

	/**
	 * @param mixed $akce_sale_multiple
	 */
	public function setAkceSaleMultiple($akce_sale_multiple)
	{
		$this->akce_sale_multiple = $akce_sale_multiple;
	}

	/**
	 * @return mixed
	 */
	public function getAkceTemplateId()
	{
		return $this->akce_template_id;
	}

	/**
	 * @param mixed $akce_template_id
	 */
	public function setAkceTemplateId($akce_template_id)
	{
		$this->akce_template_id = $akce_template_id;
	}

	/**
	 * @return mixed
	 */
	public function getAkceTemplateBonusTitle()
	{
		return $this->akce_template_bonus_title;
	}

	/**
	 * @param mixed $akce_template_bonus_title
	 */
	public function setAkceTemplateBonusTitle($akce_template_bonus_title)
	{
		$this->akce_template_bonus_title = $akce_template_bonus_title;
	}

	/**
	 * @return mixed
	 */
	public function getAkceMinitextName()
	{
		return $this->akce_minitext_name;
	}

	/**
	 * @param mixed $akce_minitext_name
	 */
	public function setAkceMinitextName($akce_minitext_name)
	{
		$this->akce_minitext_name = $akce_minitext_name;
	}


}
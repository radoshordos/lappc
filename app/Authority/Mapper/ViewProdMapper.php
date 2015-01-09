<?php namespace Authority\Mapper;

class ViewProdMapper {

	public function fetchAll($res) {
		foreach ($res as $row) {
			$entries[] = $this->fetchRow($row);
		}
		return $entries;
	}

	public function fetchRow($row) {

		$entry = new ViewProdWorker($row);
		$entry->setProdId($row->prod_id);
		$entry->setProdModeId($row->prod_mode_id);
		$entry->setProdSaleId($row->prod_sale_id);
		$entry->setProdDifferenceId($row->prod_difference_id);
		$entry->setProdWarrantyId($row->prod_warranty_id);
		$entry->setProdForexId($row->prod_forex_id);
		$entry->setProdDphId($row->prod_dph_id);
		$entry->setProdPrice($row->prod_price);
		$entry->setProdAlias($row->prod_alias);
		$entry->setProdName($row->prod_name);
		$entry->setProdDesc($row->prod_desc);
		$entry->setProdNew($row->prod_new);
		$entry->setProdStoreroom($row->prod_storeroom);
		$entry->setProdIcAll($row->prod_ic_all);
		$entry->setProdIcVisible($row->prod_ic_visible);
		$entry->setProdIcAvailabilityDiffVisible($row->prod_ic_availability_diff_visible);
		$entry->setProdSearchAlias($row->prod_search_alias);
		$entry->setProdSearchCodes($row->prod_search_codes);
		$entry->setProdSearchSell($row->prod_search_sell);
		$entry->setProdIcAvailabilityDiffVisible($row->prod_ic_availability_diff_visible);
		$entry->setProdImgNormal($row->prod_img_normal);
		$entry->setProdImgBig($row->prod_img_big);
		$entry->setProdCreatedAt($row->prod_created_at);
		$entry->setProdUpdatedAt($row->prod_updated_at);
		$entry->setProdWarrantyName($row->prod_warranty_name);
		$entry->setProdSaleName($row->prod_sale_name);
		$entry->setProdSaleMultiple($row->prod_sale_multiple);
		$entry->setTreeId($row->tree_id);
		$entry->setTreeName($row->tree_name);
		$entry->setTreeAbsolute($row->tree_absolute);
		$entry->setTreeGroupId($row->tree_group_id);
		$entry->setDevId($row->dev_id);
		$entry->setDevName($row->dev_name);
		$entry->setDevAlias($row->dev_alias);
		return $entry;
	}
}
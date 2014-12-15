<?php namespace Authority\Mapper;

class ViewProdMapper {

	public function fetchAll($res) {
		foreach ($res as $row) {
			$entries[] = $this->fetchRow($row);
		}
		return $entries;
	}

	public function fetchRow($row) {
/*
		$entry = new ViewProd();
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
		$entry->setProdStoreroom($entry->prod_storeroom);
		$entry->setProdIcAll($entry->prod_ic_all);
		$entry->setProdIcVisible($entry->prod_ic_visible);
		$entry->setProdIcAvailabilityDiffVisible($entry->prod_ic_availability_diff_visible);
		$entry->setProdSearchAlias($entry->prod_search_alias);
		$entry->setProdSearchCodes($entry->prod_search_codes);
		$entry->setProdIcAvailabilityDiffVisible($entry->prod_ic_availability_diff_visible);
		$entry->setProdImgNormal($entry->prod_img_normal);
		$entry->setProdImgBig($entry->prod_img_big);
		$entry->setProdCreatedAt($entry->prod_created_at);
		$entry->setProdUpdatedAt($entry->prod_updated_at);
		return $entry;
*/
	}
}

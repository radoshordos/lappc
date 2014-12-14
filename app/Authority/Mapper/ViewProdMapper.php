<?php namespace Authority\Mapper;

class ViewProdMapper {

	public function fetchAll($res) {
		foreach ($res as $row) {
			$entries[] = $this->fetchRow($row);
		}
		return $entries;
	}

	public function fetchRow($row) {

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
//		$entry->setProdStoreroom($entry->prod_storeroom);
		return $entry;
	}
}

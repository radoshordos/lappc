<?php namespace Authority\Runner\Task\Store;

interface iItem
{
	function getSyncProdDesc();

	function getSyncProdName();

	function getSyncIdDev();

	function getSyncItemsCodeProduct();

	function getSyncItemsCodeEan();

	function getSyncItemsPriceStandard();

	function getSyncItemsPriceAction();

	function getSyncItemsAvailabilityCount();

	function getSyncCategoryText();

	function getSyncWarranty();

	function getSyncUrl();

	function getSyncProdImgSourceArray();

	function getSyncProdAccessorySourceArray();

	function getSyncProdFileSourceArray();

	function getSyncProdWeight();

	function setSyncProdDesc();

	function setSyncProdName();

	function setSyncIdDev();

	function setSyncCategoryText();

	function setSyncWarranty();

	function setSyncUrl();

	function setSyncProdImgSourceArray();

	function setSyncProdAccessorySourceArray();

	function setSyncProdFileSourceArray();

	function setSyncItemsCodeProduct();

	function setSyncItemsCodeEan();

	function setSyncItemsPriceStandard();

	function setSyncItemsPriceAction();

	function setSyncItemsAvailabilityCount();

	function setSyncProdWeight();
}
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

	function getSyncUrl();

	function getSyncProdImgSourceArray();

	function getSyncProdAccessorySourceArray();

	function getSyncProdWeight();

	function setSyncProdDesc();

	function setSyncProdName();

	function setSyncIdDev();

	function setSyncCategoryText();

	function setSyncUrl();

	function setSyncProdImgSourceArray();

	function setSyncProdAccessorySourceArray();

	function setSyncItemsCodeProduct();

	function setSyncItemsCodeEan();

	function setSyncItemsPriceStandard();

	function setSyncItemsPriceAction();

	function setSyncItemsAvailabilityCount();

	function setSyncProdWeight();
}
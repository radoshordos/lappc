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

    function getSyncProdWeight();

    function setSyncProdDesc();

    function setSyncProdName();

    function setSyncIdDev();

    function setSyncCategoryText();

    function setSyncWarranty();

    function setSyncUrl();

    function setSyncItemsCodeProduct();

    function setSyncItemsCodeEan();

    function setSyncItemsPriceStandard();

    function setSyncItemsPriceAction();

    function setSyncItemsAvailabilityCount();

    function setSyncProdWeight();

    function storeImages();

    function storeAccessory();

    function storeFiles();

    function storeYoutube();

    function storeDescriptions();

    function storePackageContents();

    function storeParameters();
}
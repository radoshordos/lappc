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

    function getSyncCommonGroup();

    function getSyncProdImgSourceArray();

    function getSyncProdWeight();

    function setSyncProdDesc();

    function setSyncProdName();

    function setSyncIdDev();

    function setSyncCommonGroup();

    function setSyncProdImgSourceArray();

    function setSyncItemsCodeProduct();

    function setSyncItemsCodeEan();

    function setSyncItemsPriceStandard();

    function setSyncItemsPriceAction();

    function setSyncItemsAvailabilityCount();

    function setSyncProdWeight();
}
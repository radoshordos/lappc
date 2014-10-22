<?php namespace Authority\Runner\Task\Store;

interface iItem
{
    function getSyncProdDesc();

    function getSyncProdName();

    function getSyncIdDev();

    function getSyncItemsCodeProduct();

    function getSyncItemsCodeEan();

    function getSyncItemsPriceEnd();

    function getSyncItemsAvailabilityCount();

    function getSyncCommonGroup();

    function getSyncProdImgSource();

    function setSyncProdDesc();

    function setSyncProdName();

    function setSyncIdDev();

    function setSyncCommonGroup();

    function setSyncProdImgSource();

    function setSyncItemsCodeProduct();

    function setSyncItemsCodeEan();

    function setSyncItemsPriceEnd();

    function setSyncItemsAvailabilityCount();
}
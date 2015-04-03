<?php namespace Authority\Runner\Task\Store;

class RunNarexCatalogue extends AbstractRunDev implements iItem
{
    function setSyncItemsCodeProduct()
    {
        if (isset($this->shopItem['ArtCode'])) {
            $this->syncItemsCodeProduct = (string)$this->shopItem['ArtCode'];
        }
    }

    function setSyncItemsPriceStandard()
    {
    }

    function setSyncProdName()
    {
        if (isset($this->shopItem['ArtCode'])) {
            $this->syncProdName = "Narex " . (string)trim($this->shopItem['ArtCode']);
        }
    }

    function setSyncIdDev()
    {
        $this->syncIdDev = 10;
    }

    function setSyncProdDesc()
    {
        if (isset($this->shopItem['Product'])) {
            $this->syncProdDesc = (string)trim($this->shopItem['Product']);
        }
    }

    function setSyncCategoryText()
    {
        if (isset($this->shopItem['Group'])) {
            $this->syncCategoryText = $this->shopItem['Group']->Number . " - " . $this->shopItem['Group']->Name;
        }
    }

    function setSyncWarranty()
    {
        // TODO: Implement setSyncWarranty() method.
    }

    function setSyncUrl()
    {
        if (isset($this->shopItem['ProductUrl'])) {
            $this->syncUrl = (string)$this->shopItem['ProductUrl'];
        }
    }

    function setSyncProdImgSourceArray()
    {
        // TODO: Implement setSyncProdImgSourceArray() method.
    }

    function setSyncProdAccessorySourceArray()
    {
        // TODO: Implement setSyncProdAccessorySourceArray() method.
    }

    function setSyncProdFileSourceArray()
    {
        // TODO: Implement setSyncProdFileSourceArray() method.
    }

    function setSyncItemsCodeEan()
    {
        // TODO: Implement setSyncItemsCodeEan() method.
    }

    function setSyncItemsPriceAction()
    {
        // TODO: Implement setSyncItemsPriceAction() method.
    }

    function setSyncItemsAvailabilityCount()
    {
        // TODO: Implement setSyncItemsAvailabilityCount() method.
    }

    function setSyncProdWeight()
    {
        // TODO: Implement setSyncProdWeight() method.
    }
}
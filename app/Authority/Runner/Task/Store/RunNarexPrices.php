<?php namespace Authority\Runner\Task\Store;

class RunNarexPrices extends AbstractRunDev implements iItem
{
    function setSyncItemsCodeProduct()
    {
        if (isset($this->shopItem['ArtCode'])) {
            $this->syncItemsCodeProduct = (string)$this->shopItem['ArtCode'];
        }
    }

    function setSyncItemsPriceStandard()
    {
        if ($this->shopItem['Prices']->Price->Country == 'CZ') {
            $this->syncItemsPriceStandard = round(doubleval($this->shopItem['Prices']->Price->Value * self::DPH));
        }
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
        // TODO: Implement setSyncProdDesc() method.
    }

    function setSyncCategoryText()
    {
        // TODO: Implement setSyncCategoryText() method.
    }

    function setSyncWarranty()
    {
        // TODO: Implement setSyncWarranty() method.
    }

    function setSyncUrl()
    {
        // TODO: Implement setSyncUrl() method.
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

    function storeImages()
    {
        // TODO: Implement storeImages() method.
    }

    function storeDescriptions()
    {
        // TODO: Implement storeDescriptions() method.
    }

    function storePackageContents()
    {
        // TODO: Implement storePackageContents() method.
    }

    function storeParameters()
    {
        // TODO: Implement storeParameters() method.
    }
}
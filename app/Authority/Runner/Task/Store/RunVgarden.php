<?php namespace Authority\Runner\Task\Store;

class RunVgarden extends AbstractRunDev implements iItem
{
    function setSyncProdDesc()
    {
        // TODO: Implement setSyncProdDesc() method.
    }

    function setSyncProdName()
    {
        if (isset($this->shopItem['PRODUCT'])) {
            $this->syncItemsCodeEan = (string)trim($this->shopItem['PRODUCT']);
        }
    }

    function setSyncIdDev()
    {
        // TODO: Implement setSyncIdDev() method.
    }

    function setSyncCategoryText()
    {
        if (isset($this->shopItem['KATEGORIE'])) {
            $this->syncCategoryText = (string)$this->shopItem['KATEGORIE'];
        }
    }

    function setSyncWarranty()
    {
        // TODO: Implement setSyncWarranty() method.
    }

    function setSyncUrl()
    {
        // TODO: Implement setSyncUrl() method.
    }

    function setSyncItemsCodeProduct()
    {
        if (isset($this->shopItem['ID'])) {
            $this->syncItemsCodeProduct = (string)trim($this->shopItem['ID']);
        }
    }

    function setSyncItemsCodeEan()
    {
        if (isset($this->shopItem['EAN'])) {
            $this->syncItemsCodeEan = (string)trim($this->shopItem['EAN']);
        }
    }

    function setSyncItemsPriceStandard()
    {
        if (isset($this->shopItem['PRICE_VAT'])) {
            $this->syncItemsPriceStandard = round(doubleval($this->shopItem['PRICE_VAT']));
        }
    }

    function setSyncItemsPriceAction()
    {
        if (isset($this->shopItem['PRICE_AKCE_VAT'])) {
            $this->syncItemsPriceAction = round(doubleval($this->shopItem['PRICE_AKCE_VAT']));
        }
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
        if (isset($this->shopItem['IMGURL'])) {
            $this->storeArray->setImg($this->shopItem['IMGURL']);
        }
    }

    function storeAccessory()
    {
        // TODO: Implement storeAccessory() method.
    }

    function storeFiles()
    {
        // TODO: Implement storeFiles() method.
    }

    function storeYoutube()
    {
        // TODO: Implement storeYoutube() method.
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

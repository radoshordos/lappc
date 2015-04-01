<?php namespace Authority\Runner\Task\Store;

class RunPapaspol extends AbstractRunDev implements iItem
{
    public function setSyncIdDev()
    {
        if (isset($this->shopItem["MANUFACTURER"])) {
            $this->syncIdDev = $this->analyseIdDev($this->shopItem['MANUFACTURER']);
        }
    }

    private function analyseIdDev($dev_name)
    {
        switch ($dev_name) {
            case 'GeoFennel';
                return 900;
            case 'CHC';
                return 902;
            case 'Glunz';
                return 904;
            case 'Leica';
                return 906;
            case 'Nedo';
                return 908;
            case 'Nestle';
                return 910;
            case 'Soppec';
                return 912;
            case 'Topcon';
                return 914;
            case 'Goecke / Geodigital';
            case 'MIT';
            case 'Matai';
            case 'QBL';
            case 'Rabo';
            case 'Rauch';
            case 'Seba KMT';
            case 'Spectra Precision';
            case 'Theis NEW';
            case 'Trimble';
            case 'Weiss';
            case 'Zorn';
                return 0;
            default :
                return 0;
        }
    }

    function setSyncProdDesc()
    {
        if (isset($this->shopItem['DESCRIPTION'])) {
            $this->syncProdDesc = (string)$this->shopItem['DESCRIPTION'];
        }
    }

    function setSyncProdName()
    {
        if (isset($this->shopItem['PRODUCT'])) {
            $this->syncProdName = (string)$this->shopItem['PRODUCT'];
        }
    }

    function setSyncCategoryText()
    {
        if (isset($this->shopItem['CATEGORYTEXT'])) {
            $this->syncCategoryText = (string)$this->shopItem['CATEGORYTEXT'];
        }
    }

    function setSyncUrl()
    {
        if (isset($this->shopItem['URL'])) {
            $this->syncUrl = (string)$this->shopItem['URL'];
        }
    }

    function setSyncProdImgSourceArray()
    {
        if (isset($this->shopItem['IMGURL'])) {
            $this->syncProdImgSourceArray = (array)$this->shopItem['IMGURL'];
        }
    }

    public function setSyncItemsPriceStandard()
    {
        if (isset($this->shopItem['PRICE'])) {
            $this->syncItemsPriceStandard = round(doubleval($this->shopItem['PRICE'] * self::DPH));
        }
    }

    function setSyncProdAccessorySourceArray()
    {
        // TODO: Implement setSyncProdAccessorySourceArray() method.
    }

    function setSyncProdFileSourceArray()
    {
        // TODO: Implement setSyncProdFileSourceArray() method.
    }

    function setSyncItemsCodeProduct()
    {
        // TODO: Implement setSyncItemsCodeProduct() method.
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

    function setSyncWarranty()
    {
        // TODO: Implement setSyncWarranty() method.
    }
}
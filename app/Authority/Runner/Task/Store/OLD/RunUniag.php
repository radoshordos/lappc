<?php namespace Authority\Store;

class Cron_Model_ZeroRunSyncUniag extends Cron_Model_Storehouse_RunAbstractDev implements Cron_Model_Storehouse_iItem {

    public function __construct($shopitem) {
        parent::__construct($shopitem);
    }

    private function analyseIdDev($dev_name) {
        switch ($dev_name) {
            case 'AUTHOR' : return 5;
            case 'AUTHOR - CYCLE CLINIC' : return 5;
            case 'CATEYE' : return 35;
            case 'TACX' : return 40;
            case 'Panaracer' : return 45;
            case 'TEKTRO' : return 70;
            case 'RST' : return 75;
            case 'AGANG' : return 100;
            case 'CYCLONE' : return 130;
            default : throw new Exception("Unknown developer Exception");
        }
    }

    function setSyncProdName() {
        (!empty($this->shopItem->ItemName) ? $this->syncProdName = (string) $this->shopItem->ItemName : NULL);
    }

    function setSyncProdDesc() {
        if (!empty($this->shopItem->DescriptionTech)) {
            $this->syncProdDesc = (string) substr($this->shopItem->DescriptionTech, 0, 2047);
        } else {
            $this->syncProdDesc = (string) substr($this->shopItem->Description, 0, 2047);
        }
    }

    public function setSyncProdImgSource() {
        (!empty($this->shopItem->Image) ? $this->syncProdImgSource = (string) "http://www.uniag.biz/foto/full/" . $this->shopItem->Image : NULL);
    }

    function setSyncItemsAvailabilityCount() {
        ((strlen($this->shopItem->Stock) > 0) ? $this->syncItemsAvailabilityCount = (int) intval($this->shopItem->Stock) : $this->syncItemsAvailabilityCount = 0);
    }

    function setSyncIdDev() {
        (!empty($this->shopItem->Manufacturer) ? $this->syncIdDev = (int) $this->analyseIdDev($this->shopItem->Manufacturer) : NULL);
    }

    public function setSyncItemsCodeEan() {
        (!empty($this->shopItem->EAN) ? $this->syncItemsCodeEan = (string) $this->shopItem->EAN : NULL);
    }

    function setSyncItemsCodeProduct() {
        (!empty($this->shopItem->ItemNo) ? $this->syncItemsCodeProduct = (string) substr($this->shopItem->ItemNo, 3) : NULL);
    }

    function setSyncCommonGroup() {
        (!empty($this->shopItem->CategoryB) ? $this->syncCommonGroup = (string) $this->shopItem->CategoryB : NULL);
    }

    function setSyncItemsPriceEnd() {
        (!empty($this->shopItem->Price_VAT) ? $this->syncItemsPriceEnd = (int) $this->shopItem->Price_VAT : NULL);
    }

}

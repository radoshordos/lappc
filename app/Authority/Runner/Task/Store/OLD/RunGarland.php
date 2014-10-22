<?php namespace Authority\Store;

class Cron_Model_Storehouse_ZeroRunSyncGarland extends Cron_Model_Storehouse_RunAbstractDev implements Cron_Model_Storehouse_iItem {

    function __construct($shopitem) {
        parent::__construct($shopitem);
    }

    private function analyseIdDev($dev_name) {
        switch ($dev_name) {
            case 'Woodster' : return 555;
            case 'Scheppach' :
            case 'Scheppach classic' :
            case 'Scheppach special edition' : return 560;
            default : return 0;
        }
    }

    public function setSyncCommonGroup() {
        (!empty($this->shopItem['SKUPINA']) ? $this->syncCommonGroup = (string) $this->shopItem['SKUPINA'] : NULL);
    }

    public function setSyncIdDev() {
        $this->syncIdDev = $this->analyseIdDev($this->shopItem['DRUH']);
    }

    public function setSyncItemsAvailabilityCount() {

        if (intval($this->shopItem['STAVVOLNY']) > 0) {
            $this->syncItemsAvailabilityCount = intval($this->shopItem['STAVVOLNY']);
        } else {
            $this->syncItemsAvailabilityCount = 0;
        }
    }

    public function setSyncItemsCodeEan() {
        (!empty($this->shopItem['EAN']) ? $this->syncItemsCodeEan = (string) $this->shopItem['EAN'] : NULL);
    }

    public function setSyncItemsCodeProduct() {
        (!empty($this->shopItem['ID']) ? $this->syncItemsCodeProduct = (string) $this->shopItem['ID'] : NULL);
    }

    public function setSyncItemsPriceEnd() {

        $prodej6 = intval($this->shopItem['PRODEJ6']) * self::DPH;

        if ($prodej6 > 0) {
            $this->syncItemsPriceEnd = $prodej6;
        } else {
            $this->syncItemsPriceEnd = intval($this->shopItem['PRODEJ_DPH']);
        }
    }

    public function setSyncProdName() {
        (!empty($this->shopItem['NAZEV']) ? $this->syncProdName = (string) $this->shopItem['NAZEV'] : NULL);
    }

    public function setSyncProdDesc() {
        (!empty($this->shopItem['POPIS']) ? $this->syncProdDesc = (string) $this->shopItem['POPIS'] : NULL);
    }

    public function setSyncProdImgSource() {
        (!empty($this->shopItem['NAHLED_BIG']) ? $this->syncProdImgSource = (string) $this->shopItem['NAHLED_BIG'] : NULL);
    }

}

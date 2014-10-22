<?php namespace Authority\Store;

class Cron_Model_ZeroRunSyncProma extends Cron_Model_Storehouse_RunAbstractDev implements Cron_Model_Storehouse_iItem {

    const ROOT = 'SHOP';

    function __construct($shopitem) {
        parent::__construct($shopitem);
    }

    private function analyseIdDev($dev_name, $guarante_months = 0) {
        switch ($dev_name) {
            case 'FERM' :
                if ($guarante_months == 36) {
                    return 176;
                } else {
                    return 175;
                }
            case 'WORX' :
            case 'WORX Garden' : return 170;
            case 'PROMA' : return 35;
            default : return 0;
        }
    }

    function setSyncProdName() {
        (!empty($this->shopItem['PRODUCT']) ? $this->syncProdName = (string) $this->shopItem['PRODUCT'] : NULL);
    }

    function setSyncItemsCodeProduct() {
        (!empty($this->shopItem['ORDER_NR']) ? $this->syncItemsCodeProduct = (string) trim($this->shopItem['ORDER_NR']) : NULL);
    }

    public function setSyncItemsCodeEan() {
        (!empty($this->shopItem['EAN']) ? $this->syncItemsCodeEan = intval($this->shopItem['EAN']) : NULL);
    }

    public function setSyncItemsPriceEnd() {
        (!empty($this->shopItem['PRICE']) ? $this->syncItemsPriceEnd = intval($this->shopItem['PRICE']) : NULL);
    }

    public function setSyncIdDev() {
        $this->syncIdDev = $this->analyseIdDev($this->shopItem['BRAND'], $this->shopItem['GUARANTEE_MONTHS']);
    }

    public function setSyncItemsAvailabilityCount() {
        (!empty($this->shopItem['AVAILABLE']) ? $this->syncItemsAvailabilityCount = intval($this->shopItem['AVAILABLE']) : $this->syncItemsAvailabilityCount = 0);
    }

    public function setSyncCommonGroup() {
        return NULL;
    }

    public function setSyncProdDesc() {
        return NULL;
    }

    public function setSyncProdImgSource() {
        return NULL;
    }

}

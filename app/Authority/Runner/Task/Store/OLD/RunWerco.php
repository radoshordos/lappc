<?php namespace Authority\Store;

class Cron_Model_ZeroRunSyncWerco extends Cron_Model_Storehouse_RunAbstractDev implements Cron_Model_Storehouse_iItem {

    const ROOT = 'SHOP';

    function __construct($shopitem) {
        parent::__construct($shopitem);
    }

    public function setSyncItemsCodeProduct() {
        (!empty($this->shopItem['Kod']) ? $this->syncItemsCodeProduct = (string) $this->shopItem['Kod'] : NULL);
    }

    public function setSyncProdName() {
        (!empty($this->shopItem['Nazev']) ? $this->syncProdName = (string) $this->shopItem['Nazev'] : NULL);
    }

    public function setSyncItemsPriceEnd() {
        (!empty($this->shopItem['CenaSDPH']) ? $this->syncItemsPriceEnd = round($this->shopItem['CenaSDPH']) : NULL);
    }

    public function setSyncItemsAvailabilityCount() {
        (!empty($this->shopItem['Skladem']) ? $this->syncItemsAvailabilityCount = intval($this->shopItem['Skladem']) : $this->syncItemsAvailabilityCount = 0);
    }

    public function setSyncIdDev() {
        return $this->syncIdDev = 435;
    }

    public function setSyncCommonGroup() {
        
    }

    public function setSyncItemsCodeEan() {
        
    }

    public function setSyncProdDesc() {
        
    }

    public function setSyncProdImgSource() {
        
    }

}

?>
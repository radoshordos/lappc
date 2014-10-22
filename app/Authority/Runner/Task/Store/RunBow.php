<?php namespace Authority\Runner\Task\Store;

class RunBow extends AbstractRunDev implements iItem {

    const ROOT = 'SHOP';

    function __construct($shopitem) {
        parent::__construct($shopitem);
    }

    private function analyseIdDev($dev_name) {
       
        switch ($dev_name) {
            case 'BOW' : return 200;
            case 'Aircraft®' : return 202;
            case 'greenLine' : return 0;
            case 'FSB - Sanchez Bielsa' : return 0;                                
            case 'Holzstar®' : return 204;
            case 'Holzkraft®' : return 206;
            case 'Karnasch®' : return 0;                
            case 'Metallkraft® ' : return 210;
            case 'NUMCO' : return 208;
            case 'OPTIMUM®' : return 212;
            case 'quantum® ' : return 214;
            case 'RHTC' : return 0;                
            case 'RÖHM®' : return 0;                
            case 'SIEG' : return 220;
            case 'Schweißkraft®' : return 216;                
            case 'Thermdrill' : return 0;
            case 'Unicraft®' : return 218;
            default : return 0;
        }
    }

    function setSyncProdName() {
        (!empty($this->shopItem['PRODUCTNAME']) ? $this->syncProdName = (string) $this->shopItem['PRODUCTNAME']: NULL);
    }

    function setSyncItemsCodeProduct() {
        (!empty($this->shopItem['PRODUCTNO']) ? $this->syncItemsCodeProduct = (string) $this->shopItem['PRODUCTNO'] : NULL);
    }

    public function setSyncItemsCodeEan() {
        (!empty($this->shopItem['EAN']) ? $this->syncItemsCodeEan = (string) $this->shopItem['EAN'] : NULL);
    }

    public function setSyncItemsPriceEnd() {
        (!empty($this->shopItem['PRICE']->COMMON) ? $this->syncItemsPriceEnd = intval($this->shopItem['PRICE']->COMMON * self::DPH) : NULL);
    }

    public function setSyncCommonGroup() {
        $chars = array('<![CDATA[' => "", ']]>' => '');
        (!empty($this->shopItem['CATEGORY']) ? $this->syncCommonGroup = (string) str_replace(array_keys($chars), array_values($chars), $this->shopItem['CATEGORY']) : NULL);
    }

    public function setSyncItemsAvailabilityCount() {
        (($this->shopItem['INSTOCK'] == 'ano') ? $this->syncItemsAvailabilityCount = 1 : $this->syncItemsAvailabilityCount = 0);
    }

    public function setSyncIdDev() {
        $this->syncIdDev = $this->analyseIdDev($this->shopItem['MANUFACTURER']);
    }

    public function setSyncProdDesc() {
        
    }

    public function setSyncProdImgSource() {
        
    }

}
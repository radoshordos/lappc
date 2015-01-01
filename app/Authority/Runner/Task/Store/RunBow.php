<?php namespace Authority\Runner\Task\Store;

class RunBow extends AbstractRunDev implements iItem
{
    const ROOT = 'SHOP';

    function __construct($shop_item, $record_id)
    {
        parent::__construct($shop_item, $record_id);
    }

    function setSyncProdName()
    {
        (!empty($this->shopItem['PRODUCTNAME']) ? $this->syncProdName = (string)$this->shopItem['PRODUCTNAME'] : NULL);
    }

    function setSyncItemsCodeProduct()
    {
        (!empty($this->shopItem['PRODUCTNO']) ? $this->syncItemsCodeProduct = (string)$this->shopItem['PRODUCTNO'] : NULL);
    }

    public function setSyncItemsCodeEan()
    {
        (!empty($this->shopItem['EAN']) ? $this->syncItemsCodeEan = (string)$this->shopItem['EAN'] : NULL);
    }

    public function setSyncCategoryText()
    {
        $chars = ['<![CDATA[' => "", ']]>' => ''];
        (!empty($this->shopItem['CATEGORY']) ? $this->syncCommonGroup = (string)str_replace(array_keys($chars), array_values($chars), $this->shopItem['CATEGORY']) : NULL);
    }

    public function setSyncItemsAvailabilityCount()
    {
        (($this->shopItem['INSTOCK'] == 'ano') ? $this->syncItemsAvailabilityCount = 1 : $this->syncItemsAvailabilityCount = 0);
    }

    function setSyncItemsPriceStandard()
    {
        (intval($this->shopItem['PRICE']->COMMON) > 0 ? $this->syncItemsPriceStandard = doubleval($this->shopItem['PRICE']->COMMON * self::DPH) : NULL);
    }

    function setSyncItemsPriceAction()
    {
        (intval($this->shopItem['PRICE']->ACTION) > 0 ? $this->syncItemsPriceAction = doubleval($this->shopItem['PRICE']->ACTION * self::DPH) : NULL);
    }

    public function setSyncIdDev()
    {
        (isset($this->shopItem['MANUFACTURER'])) ? $this->syncIdDev = $this->analyseIdDev($this->shopItem['MANUFACTURER']) : $this->syncIdDev = NULL;
    }

    private function analyseIdDev($dev_name)
    {

        switch ($dev_name) {
            case 'BOW' :
                return 200;
            case 'Aircraft®' :
                return 202;
            case 'greenLine' :
                return 0;
            case 'FSB - Sanchez Bielsa' :
                return 0;
            case 'Holzstar®' :
                return 204;
            case 'Holzkraft®' :
                return 206;
            case 'Karnasch®' :
                return 0;
            case 'Metallkraft® ' :
                return 210;
            case 'NUMCO' :
                return 208;
            case 'OPTIMUM®' :
                return 212;
            case 'quantum® ' :
                return 214;
            case 'RHTC' :
                return 0;
            case 'RÖHM®' :
                return 0;
            case 'SIEG' :
                return 220;
            case 'Schweißkraft®' :
                return 216;
            case 'Thermdrill' :
                return 0;
            case 'Unicraft®' :
                return 218;
            default :
                return 0;
        }
    }

    function setSyncProdWeight()
    {
        return $this->syncProdWeight = 0;
    }

    public function setSyncProdDesc()
    {
        return NULL;
    }

    function setSyncProdImgSourceArray()
    {
        return NULL;
    }

    function setSyncProdAccessorySourceArray()
    {
        return NULL;
    }

    function setSyncUrl()
    {
        return NULL;
    }
}
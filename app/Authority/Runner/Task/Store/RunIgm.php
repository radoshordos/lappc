<?php namespace Authority\Runner\Task\Store;

class RunIgm extends AbstractRunDev implements iItem
{
    const ROOT = 'SHOP';

    function __construct($shop_item, $record_id)
    {
        parent::__construct($shop_item, $record_id);
    }

    private function analyseIdDev($dev_name)
    {
        switch ($dev_name) {
            case 'IGM Basic Line' :
            case 'IGM Expert Line' :
            case 'IGM Professional Tools' :
            case 'IGM Profi Line' :
                return 800;
            case 'CMT Orange Tools' :
                return 802;
            case 'IGM Fachmann Tools' :
                return 804;
            case 'JET' :
                return 806;
            case 'Silky' :
                return 808;
            case 'Titebond' :
                return 810;
            case 'Uvex' :
                return 812;
            default :
                return 0;
        }
    }

    public function setSyncIdDev()
    {
        $this->syncIdDev = $this->analyseIdDev($this->shopItem['MANUFACTURER']);
    }

    function setSyncProdName()
    {
        (!empty($this->shopItem['PRODUCTNAME']) ? $this->syncProdName = (string)trim($this->shopItem['PRODUCTNAME']) : NULL);
    }

    public function setSyncProdDesc()
    {
        (!empty($this->shopItem['DESCRIPTION']) ? $this->syncProdDesc = (string)trim($this->shopItem['DESCRIPTION']) : NULL);
    }

    function setSyncItemsCodeProduct()
    {
        (!empty($this->shopItem['PRODUCTNO']) ? $this->syncItemsCodeProduct = (string)trim($this->shopItem['PRODUCTNO']) : NULL);
    }

    public function setSyncItemsCodeEan()
    {
        (!empty($this->shopItem['EAN']) ? $this->syncItemsCodeEan = (string)trim($this->shopItem['EAN']) : NULL);
    }

    public function setSyncItemsPriceStandard()
    {
        (!empty($this->shopItem['PRODUCTPRICE']) ? $this->syncItemsPriceStandard = doubleval($this->shopItem['PRODUCTPRICE']) : NULL);
    }

    function setSyncItemsPriceAction()
    {
        (!empty($this->shopItem['PRODUCTACTIONPRICE']) ? $this->syncItemsPriceAction = doubleval($this->shopItem['PRODUCTACTIONPRICE']) : NULL);
    }

    function setSyncProdWeight()
    {
        $weight = str_replace(",", ".", $this->shopItem['MAINUNITWEIGHT']);
        (!empty($this->shopItem['MAINUNITWEIGHT']) ? $this->syncProdWeight = floatval($weight) : $this->syncProdWeight = 0);
    }

    public function setSyncCommonGroup()
    {
        (!empty($this->shopItem['CATEGORY']) ? $this->syncCommonGroup = substr($this->shopItem['CATEGORY'], 12, 6) . "-" . substr(md5($this->shopItem['CATEGORY']), 0, 6) : NULL);
    }

    function setSyncProdImgSourceArray()
    {
        $pic = (array)$this->shopItem['PRODUCTPICTURES'];
        if (count($pic) > 0) {
            $this->syncProdImgSourceArray = $pic;
        }
        return NULL;
    }

    public function setSyncItemsAvailabilityCount()
    {
        return $this->syncItemsAvailabilityCount = 0;
    }
}

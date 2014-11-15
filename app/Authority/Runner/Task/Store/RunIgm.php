<?php namespace Authority\Runner\Task\Store;

class RunIgm extends AbstractRunDev implements iItem
{
    const ROOT = 'SHOP';

    function __construct($shop_item, $record_id)
    {
        parent::__construct($shop_item, $record_id);
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

    public function setSyncIdDev()
    {
        $this->syncIdDev = $this->analyseIdDev($this->shopItem['MANUFACTURER']);
    }

    private function analyseIdDev($dev_name)
    {

        echo $dev_name . "<br />\n";
   /*
800 - IGM
802 - CTM
804 - FACHMAN
806 - JET
808 - Silky
810 - Titebond
812 - Uvex
       */ /*
        switch ($dev_name) {
            case 'FERM' :
                if ($guarante_months == 36) {
                    return 176;
                } else {
                    return 175;
                }
            case 'WORX' :
            case 'WORX Garden' :
                return 170;
            case 'PROMA' :
                return 35;
            default :
                return 0;
        }
        */
    }

    public function setSyncItemsAvailabilityCount()
    {
        (!empty($this->shopItem['AVAILABLE']) ? $this->syncItemsAvailabilityCount = intval($this->shopItem['AVAILABLE']) : $this->syncItemsAvailabilityCount = 0);
    }

    public function setSyncCommonGroup()
    {
        return NULL;
    }


    public function setSyncProdImgSource()
    {
        return NULL;
    }

    function setSyncItemsPriceAction()
    {
        return NULL;
    }
}

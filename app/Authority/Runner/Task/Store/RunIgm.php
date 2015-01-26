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
            case 'BASIC Line' :
            case 'EXPERT Line' :
            case 'IGM Professional' :
            case 'PROFI Line' :
                return 800;
            case 'CMT Orange Tools' :
                return 802;
            case 'IGM Fachmann Tools' :
                return 804;
            case 'IGM Fachmann' :
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

    private function analyseName($dev_name)
    {
        switch ($dev_name) {
            case 'IGM Basic Line' :
            case 'IGM Expert Line' :
            case 'IGM Professional Tools' :
            case 'IGM Profi Line' :
            case 'BASIC Line' :
            case 'EXPERT Line' :
            case 'IGM Professional' :
            case 'PROFI Line' :
                return "IGM";
            case 'CMT Orange Tools' :
                return "CMT";
            case 'IGM Fachmann Tools' :
                return "CMT";
            case 'IGM Fachmann' :
                return 'Fachmann';
            case 'JET' :
                return 'JET';
            case 'Silky' :
                return 'Silky';
            case 'Titebond' :
                return 'Titebond';
            case 'Uvex' :
                return 'Uvex';
            default :
                return 'ERR_IGM';
        }
    }

    public function setSyncIdDev()
    {
        $this->syncIdDev = $this->analyseIdDev($this->shopItem['MANUFACTURER']);
    }

    function setSyncProdName()
    {
        if (isset($this->shopItem['PRODUCTNO']) && isset($this->shopItem['MANUFACTURER'])) {
            $this->syncProdName = $this->analyseName($this->shopItem['MANUFACTURER']) . " " . trim($this->shopItem['PRODUCTNO']);
        }
    }

    public function setSyncProdDesc()
    {
        if (isset($this->shopItem['PRODUCTNAME'])) {
            $this->syncProdDesc = (string)trim($this->shopItem['PRODUCTNAME']);
        }
    }

    function setSyncItemsCodeProduct()
    {
        if (isset($this->shopItem['PRODUCTNO'])) {
            $this->syncItemsCodeProduct = (string)trim($this->shopItem['PRODUCTNO']);
        }
    }

    public function setSyncItemsCodeEan()
    {
        if (isset($this->shopItem['EAN'])) {
            $this->syncItemsCodeEan = (string)trim($this->shopItem['EAN']);
        }
    }

    public function setSyncItemsPriceStandard()
    {
        if (isset($this->shopItem['PRODUCTPRICE'])) {
            $this->syncItemsPriceStandard = round(doubleval($this->shopItem['PRODUCTPRICE'] * self::DPH));
        }
    }

    function setSyncItemsPriceAction()
    {
        if (isset($this->shopItem['PRODUCTACTIONPRICE'])) {
            $this->syncItemsPriceAction = round(doubleval($this->shopItem['PRODUCTACTIONPRICE'] * self::DPH));
        }
    }

    function setSyncProdWeight()
    {
        if (isset($this->shopItem['MAINUNITWEIGHT'])) {
            $this->syncProdWeight = round(floatval(str_replace(",", ".", $this->shopItem['MAINUNITWEIGHT'])), 2);
        }
    }

    public function setSyncCategoryText()
    {
        (!empty($this->shopItem['CATEGORY']) ? $this->syncCategoryText = $this->shopItem['CATEGORY'] : NULL);
    }

    function setSyncProdImgSourceArray()
    {
        if (!empty($this->shopItem['PRODUCTPICTURES'])) {
            $ai = new \ArrayIterator();
            $pp = (array)$this->shopItem['PRODUCTPICTURES'];

            if (count($pp) > 0) {
                foreach ($pp as $val) {
                    $ai->append($val);
                }
            }
            return $this->syncProdImgSourceArray = $ai->getArrayCopy();
        }
    }

    function setSyncProdAccessorySourceArray()
    {
        if (!empty($this->shopItem['PRODUCTACCESSORIES'])) {

            $ai = new \ArrayIterator();
            $pa = (array)$this->shopItem['PRODUCTACCESSORIES'];

            if (count($pa) > 0) {
                foreach ($pa as $val) {
                    $ai->append($val);
                }
            }
            return $this->syncProdAccessorySourceArray = $ai->getArrayCopy();
        }
    }

    function setSyncUrl()
    {
        // TODO: Implement setSyncUrl() method.
    }

    function setSyncWarranty()
    {
        // TODO: Implement setSyncWarranty() method.
    }

    function setSyncItemsAvailabilityCount()
    {
        // TODO: Implement setSyncItemsAvailabilityCount() method.
    }

    function setSyncProdFileSourceArray()
    {
        // TODO: Implement setSyncProdFileSourceArray() method.
    }
}
<?php namespace Authority\Runner\Task\Store;

class RunProma extends AbstractRunDev implements iItem
{
    const ROOT = 'SHOP';

    public function setSyncIdDev()
    {
        if (isset($this->shopItem['MANUFACTURER'])) {
            $this->syncIdDev = $this->analyseIdDev(trim($this->shopItem['MANUFACTURER']));
        }
    }

    private function analyseIdDev($dev_name)
    {
        switch ($dev_name) {
            case 'PROMA' :
                return 100;
            case 'FERM' :
                return 102;
            case 'WORX' :
            case 'WORX Garden' :
                return 104;
            case 'COMPRECISE' :
                return 106;
            case 'DIY' :
                return 108;
            default :
                return 0;
        }
    }

    function setSyncProdName()
    {
        if (isset($this->shopItem['PRODUCT'])) {
            $this->syncProdName = (string)trim($this->shopItem['PRODUCT']);
        }
    }

    function setSyncItemsCodeProduct()
    {
        (!empty($this->shopItem['ORDER_NR']) ? $this->syncItemsCodeProduct = (string)trim($this->shopItem['ORDER_NR']) : NULL);
    }

    public function setSyncItemsCodeEan()
    {
        if (isset($this->shopItem['EAN'])) {
            $this->syncItemsCodeEan = (string)trim($this->shopItem['EAN']);
        }
    }

    public function setSyncItemsPriceStandard()
    {
        if (isset($this->shopItem['PRICE'])) {
            $this->syncItemsPriceStandard = round(doubleval($this->shopItem['PRICE'] * self::DPH));
        }
    }

    public function setSyncItemsAvailabilityCount()
    {
        if (isset($this->shopItem['AVAILABLE'])) {
            $this->syncItemsAvailabilityCount = intval($this->shopItem['AVAILABLE']);
        }
    }

    public function setSyncCategoryText()
    {
        if (isset($this->shopItem['CATEGORY'])) {
            $this->syncCategoryText = (string)$this->shopItem['CATEGORY'];
        }
    }

    function setSyncWarranty()
    {
        if (isset($this->shopItem['GUARANTEE_MONTHS'])) {
            $this->syncWarranty = intval($this->shopItem['GUARANTEE_MONTHS']);
        }
    }

    function setSyncProdWeight()
    {
        if (isset($this->shopItem['WEIGHT_GROSS'])) {
            $this->syncProdWeight = round(doubleval($this->shopItem['WEIGHT_GROSS']), 2);
        }
    }

    function setSyncProdDesc()
    {
        if (isset($this->shopItem['DESCRIPTION'])) {
            $this->syncProdDesc = (string)trim($this->shopItem['DESCRIPTION']);
        }
    }

    public function storeImages()
    {
        if (!empty($this->shopItem['IMAGES'])) {
            $pp = (array)$this->shopItem['IMAGES'];
            if (count($pp) > 0) {
                foreach ($pp as $val) {
                    if (is_array($val)) {
                        foreach ($val as $v) {
                            if (strpos($v, "2-roky.jpg") === FALSE &&
                                strpos($v, "3-roky.jpg") === FALSE &&
                                strpos($v, "comprecisered.jpg") === FALSE &&
                                strpos($v, "WORX-21black.jpg") === FALSE &&
                                strpos($v, "logoworx.jpg") === FALSE &&
                                strpos($v, "FERMRGB.jpg") === FALSE &&
                                strpos($v, "logoFERMNEW2012CMYK.jpg") === FALSE &&
                                strpos($v, "WORX-garden-logo-500.jpg") === FALSE &&
                                strpos($v, "logoPROMAupravenebezR.jpg") === FALSE &&
                                strpos($v, "Worxgardenlogo.jpg") === FALSE
                            ) {
                                $this->storeArray->setImg($v);
                            }
                        }
                    } else {
                        $this->storeArray->setAccessory($val);
                    }
                }
            }
        }
    }

    function setSyncUrl()
    {
        // TODO: Implement setSyncUrl() method.
    }

    function setSyncItemsPriceAction()
    {
        // TODO: Implement setSyncItemsPriceAction() method.
    }

    function storeAccessory()
    {
        // TODO: Implement storeAccessory() method.
    }

    function storeFiles()
    {
        // TODO: Implement storeFiles() method.
    }

    function storeYoutube()
    {
        // TODO: Implement storeYoutube() method.
    }

    function storeDescriptions()
    {
        // TODO: Implement storeDescriptions() method.
    }

    function storePackageContents()
    {
        // TODO: Implement storePackageContents() method.
    }

    function storeParameters()
    {
        // TODO: Implement storeParameters() method.
    }
}

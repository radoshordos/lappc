<?php namespace Authority\Runner\Task\Store;

class RunMakita extends AbstractRunDev implements iItem
{
    function __construct($shop_item, $record_id)
    {
        parent::__construct($shop_item, $record_id);
    }

    private function analyseIdDev($dev_name)
    {
        switch ((string)$dev_name) {
            case '00' :
                return 5;
            case '01' :
                return 5;
            case '02' :
                return 5;
            case '03' :
                return 5;
            case '31' :
                return 5;
            case '39' :
                return 30;
            case '40' :
                return 30;
            case '41' :
                return 6;
            default :
                return 0;
        }
    }

    function setSyncProdName()
    {
        if (isset($this->shopItem['PRODUCT'])) {
            $this->syncProdName = (string)$this->shopItem['PRODUCT'];
        }
    }

    function setSyncCommonGroup()
    {
        if (!empty($this->shopItem['CATEGORYTEXT'])) {
            $this->syncCategoryText = (string)$this->shopItem['CATEGORYTEXT'];
        } else if (!empty($this->shopItem['SORTIMENT1ID'])) {
            $this->syncCategoryText = (string)$this->shopItem['SORTIMENT1ID'];
        }
    }

    function setSyncItemsCodeProduct()
    {
        if (isset($this->shopItem['ITEM_ID'])) {
            $this->syncItemsCodeProduct = (string)$this->shopItem['ITEM_ID'];
        }
    }

    function setSyncUrl()
    {
        if (isset($this->shopItem['URL'])) {
            $this->syncUrl = (string)$this->shopItem['URL'];
        }
    }

    function setSyncProdDesc()
    {
        if (isset($this->shopItem['PRODUCT'])) {
            $this->syncProdDesc = (string)$this->shopItem['PRODUCT'];
        }
    }

    function setSyncIdDev()
    {
        if (isset($this->shopItem['SORTIMENT1ID'])) {
            $this->syncIdDev = $this->analyseIdDev($this->shopItem['SORTIMENT1ID']);
        }
    }

    function setSyncCategoryText()
    {
        if (isset($this->shopItem['CATEGORYTEXT'])) {
            $this->syncCategoryText = (string)$this->shopItem['CATEGORYTEXT'];
        }
    }

    function setSyncItemsPriceStandard()
    {
        if (isset($this->shopItem['RECOMMENDED_PRICE_VAT'])) {
            $this->syncItemsPriceStandard = round(doubleval($this->shopItem['RECOMMENDED_PRICE_VAT']));
        }
    }

    public function setSyncItemsAvailabilityCount()
    {
        if (isset($this->shopItem['ONSTOCK'])) {
            if ($this->shopItem['ONSTOCK'] == 'ANO') {
                $this->syncItemsAvailabilityCount = 1;
            } elseif ($this->shopItem['ONSTOCK'] == 'NE') {
                $this->syncItemsAvailabilityCount = 0;
            }
        }
    }

    function setSyncItemsCodeEan()
    {
        if (isset($this->shopItem['EAN'])) {
            $this->syncItemsCodeEan = (string)$this->shopItem['EAN'];
        }
    }

    function storeImages()
    {
        if (!empty($this->shopItem['IMGURL']) || !empty($this->shopItem['IMGURL_ALTERNATIVE'])) {
            if (!empty($this->shopItem['IMGURL']) && $this->shopItem['IMGURL'] != 'http://templates/makita/grafika/telo/bez-nahledu.png') {
                $this->storeArray->setImg($this->shopItem['IMGURL']);
            }
            if (!empty($this->shopItem['IMGURL_ALTERNATIVE'])) {
                if (is_array($this->shopItem['IMGURL_ALTERNATIVE'])) {
                    foreach ($this->shopItem['IMGURL_ALTERNATIVE'] as $val) {
                        $this->storeArray->setImg($val);
                    }
                } else {
                    $this->storeArray->setImg($this->shopItem['IMGURL_ALTERNATIVE']);
                }
            }
        }
    }

    function storeAccessory()
    {
        if (!empty($this->shopItem['ACCESSORY'])) {
            if (is_array($this->shopItem['ACCESSORY'])) {
                foreach ($this->shopItem['ACCESSORY'] as $val) {
                    $this->storeArray->setAccessory($val);
                }
            } else {
                $this->storeArray->setAccessory($this->shopItem['ACCESSORY']);
            }
        }
    }

    function storeFiles()
    {
        if (!empty($this->shopItem['ATTACHMENT'])) {
            if (!empty($this->shopItem['ATTACHMENT'])) {
                if (is_array($this->shopItem['ATTACHMENT'])) {
                    foreach ($this->shopItem['ATTACHMENT'] as $val) {
                        $this->storeArray->setMediaPdf($val);
                    }
                } else {
                    $this->storeArray->setMediaPdf($this->shopItem['ATTACHMENT']);
                }
            }
        }
    }

    function storePackageContents()
    {
        if (!empty($this->shopItem['DELIVERYSCOPE'])) {
            if (is_array($this->shopItem['DELIVERYSCOPE'])) {
                foreach ($this->shopItem['DELIVERYSCOPE'] as $val) {
                    $this->storeArray->setAccessory($val);
                }
            } else {
                $this->storeArray->setMediaPackagecontents($this->shopItem['DELIVERYSCOPE']);
            }
        }
    }

    function setSyncWarranty()
    {
        // TODO: Implement setSyncWarranty() method.
    }

    function setSyncItemsPriceAction()
    {
        // TODO: Implement setSyncItemsPriceAction() method.
    }

    function setSyncProdWeight()
    {
        // TODO: Implement setSyncProdWeight() method.
    }

    function storeYoutube()
    {
        // TODO: Implement storeYoutube() method.
    }

    function storeDescriptions()
    {
        // TODO: Implement storeDescriptions() method.
    }

    function storeParameters()
    {
        // TODO: Implement storeParameters() method.
    }
}
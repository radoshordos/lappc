<?php namespace Authority\Runner\Task\Store;

class RunVgarden extends AbstractRunDev implements iItem
{
    private function analyseIdDev($string)
    {
        if (strpos($string, 'VeGA ') !== FALSE) {
            return 265;
        } elseif (strpos($string, 'Weibang ') !== FALSE) {
            return 290;
        } else {
            return 0;
        }
    }

    function setSyncProdDesc()
    {
        // TODO: Implement setSyncProdDesc() method.
    }

    function setSyncProdName()
    {
        if (isset($this->shopItem['PRODUCT'])) {
            $this->syncProdName = (string)trim($this->shopItem['PRODUCT']);
        }
    }

    function setSyncIdDev()
    {
        if (isset($this->shopItem['PRODUCT'])) {
            $this->syncIdDev = $this->analyseIdDev($this->shopItem['PRODUCT']);
        }
    }

    function setSyncCategoryText()
    {
        if (isset($this->shopItem['KATEGORIE'])) {
            $this->syncCategoryText = (string)$this->shopItem['KATEGORIE'];
        }
    }

    function setSyncItemsCodeProduct()
    {
        if (isset($this->shopItem['ID'])) {
            $this->syncItemsCodeProduct = (string)trim($this->shopItem['ID']);
        }
    }

    function setSyncItemsCodeEan()
    {
        if (isset($this->shopItem['EAN'])) {
            $this->syncItemsCodeEan = (string)trim($this->shopItem['EAN']);
        }
    }

    function setSyncItemsPriceStandard()
    {
        if (isset($this->shopItem['PRICE_VAT'])) {
            $this->syncItemsPriceStandard = round(doubleval($this->shopItem['PRICE_VAT']));
        }
    }

    function setSyncItemsPriceAction()
    {
        if (isset($this->shopItem['PRICE_AKCE_VAT'])) {
            $this->syncItemsPriceAction = round(doubleval($this->shopItem['PRICE_AKCE_VAT']));
        }
    }

    function storeImages()
    {
        if (isset($this->shopItem['IMGURL'])) {
            $this->storeArray->setImg($this->shopItem['IMGURL']);
        }
    }

    function storeParameters()
    {
        if (isset($this->shopItem['DESCRIPTION']) && !empty($this->shopItem['DESCRIPTION'])) {
            $desc = explode("\n", $this->shopItem['DESCRIPTION']);
            foreach ($desc as $line) {
                if (strlen(trim($line)) > 0) {
                    $this->storeArray->setMediaParameters(trim(strip_tags($line)));
                }
            }
        }
    }

    function setSyncWarranty()
    {
        // TODO: Implement setSyncWarranty() method.
    }

    function setSyncUrl()
    {
        // TODO: Implement setSyncUrl() method.
    }


    function setSyncItemsAvailabilityCount()
    {
        // TODO: Implement setSyncItemsAvailabilityCount() method.
    }

    function setSyncProdWeight()
    {
        // TODO: Implement setSyncProdWeight() method.
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


}

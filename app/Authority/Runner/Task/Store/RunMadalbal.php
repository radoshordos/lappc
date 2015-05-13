<?php namespace Authority\Runner\Task\Store;

class RunMadalbal extends AbstractRunDev implements iItem
{
    const ROOT = 'SHOP';

    function __construct($shop_item, $record_id)
    {
        parent::__construct($shop_item, $record_id);
    }

    function setSyncIdDev()
    {
        if (isset($this->shopItem['Brand'])) {
            $this->syncIdDev = $this->analyseIdDev($this->shopItem['Brand']);
        }
    }

    private function analyseIdDev($dev_name)
    {
        switch ($dev_name) {
            case 'EXTOL CRAFT' :
            case 'EXTOL INDUSTRIAL' :
            case 'EXTOL LIGHT' :
            case 'EXTOL PREMIUM' :
                return 850;
            case 'HERON' :
                return 852;
            case 'BALLETTO' :
                return 854;
            case 'FORTUM' :
                return 856;
            case 'FRESHHH' :
                return 858;
            case 'IMPERIA' :
                return 860;
            case 'KITO' :
                return 862;
            case 'OPERA' :
                return 864;
            case 'SONATA' :
                return 866;
            case 'VIKING' :
                return 868;
            case 'VITTORIA' :
                return 870;
            default :
                return 0;
        }
    }

    function setSyncProdName()
    {
        if (isset($this->shopItem['Brand']) && (isset($this->shopItem['ProductCode']))) {
            $this->syncProdName = (string)ucwords(strtolower($this->shopItem['Brand'])) . " " . $this->shopItem['ProductCode'];
        }
    }

    function setSyncProdDesc()
    {
        if (isset($this->shopItem['Name'])) {
            $this->syncProdDesc = (string)$this->shopItem['Name'];
        }
    }

    function setSyncItemsCodeProduct()
    {
        if (isset($this->shopItem['ProductCode'])) {
            $this->syncItemsCodeProduct = (string)$this->shopItem['ProductCode'];
        }
    }

    function setSyncProdWeight()
    {
        if (isset($this->shopItem['Logistics'])) {
            $logistics = array_filter((array)$this->shopItem['Logistics']);
            if (isset($logistics['Weight'])) {
                $this->syncProdWeight = round(floatval($logistics['Weight']), 2);
            }
        }
    }

    function setSyncItemsCodeEan()
    {
        if (isset($this->shopItem['Logistics'])) {
            $logistics = array_filter((array)$this->shopItem['Logistics']);
            if (isset($logistics['EAN'])) {
                $this->syncItemsCodeEan = (string)$logistics['EAN'];
            }
        }
    }

    function setSyncItemsPriceStandard()
    {
        if (isset($this->shopItem['EndUserVAT'])) {
            $this->syncItemsPriceStandard = doubleval($this->shopItem['EndUserVAT']);
        }
    }

    function setSyncCategoryText()
    {
        if (isset($this->shopItem['ProductType']) || isset($this->shopItem['Category']) || isset($this->shopItem['CategoryCode'])) {

            $ai = new \ArrayIterator();

            if (isset($this->shopItem['CategoryCode'])) {
                $ai->append($this->shopItem['CategoryCode']);
            }
            if (isset($this->shopItem['ProductType'])) {
                $ai->append($this->shopItem['ProductType']);
            }
            if (isset($this->shopItem['Category'])) {
                $ai->append($this->shopItem['Category']);
            }

            $this->syncCategoryText = implode(' | ', $ai->getArrayCopy());
        }
    }

    function setSyncWarranty()
    {
        if (isset($this->shopItem['Guarantee'])) {
            $this->syncWarranty = intval($this->shopItem['Guarantee']);
        }
    }

    function storeImages()
    {
        if (isset($this->shopItem['Images'])) {
            $images = array_filter((array)$this->shopItem['Images']);
            if (count($images) > 0) {
                foreach ($images as $image) {
                    if (is_array($image)) {
                        foreach ($image as $img) {
                            $this->storeArray->setImg($img);
                        }
                    } else {
                        $this->storeArray->setImg($image);
                    }
                }
            }
        }
    }

    function storeAccessory()
    {
        if (isset($this->shopItem['Accessories'])) {
            $accessories = array_filter((array)$this->shopItem['Accessories']);
            if (count($accessories) > 0) {
                foreach ($accessories as $accessorie) {
                    if (is_array($accessorie)) {
                        foreach ($accessorie as $acc) {
                            $this->storeArray->setAccessory($acc);
                        }
                    } else {
                        $this->storeArray->setAccessory($accessorie);
                    }
                }
            }
        }
    }

    function setSyncItemsPriceAction()
    {
        // TODO: Implement setSyncItemsPriceAction() method.
    }

    function setSyncItemsAvailabilityCount()
    {
        // TODO: Implement setSyncItemsAvailabilityCount() method.
    }

    function setSyncUrl()
    {
        // TODO: Implement setSyncUrl() method.
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

    function storeFiles()
    {
        // TODO: Implement storeFiles() method.
    }

    function storeYoutube()
    {
        // TODO: Implement storeYoutube() method.
    }
}
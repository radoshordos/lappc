<?php namespace Authority\Runner\Task\Store;

class RunBow extends AbstractRunDev implements iItem
{
    const ROOT = 'SHOP';

    function __construct($shop_item, $record_id)
    {
        parent::__construct($shop_item, $record_id);
    }

    public function isUseRequired()
    {
        return (
            (strlen($this->getSyncItemsCodeProduct()) > 1) &&
            (strlen($this->getSyncProdName()) > 1) &&
            (intval($this->getSyncIdDev()) > 0) &&
            (intval($this->getSyncItemsPriceStandard()) > 19) &&
            (!in_array($this->getSyncItemsCodeEan(), [
                '9006248000605',
                '4036351000921',
                '4036351032335',
                '4036351033165',
                '4036351033875',
                '4036351009504',
                '4030635006562',
                '4030635000973',
                '4036351001300',
                '4030635008856',
                '4030635003165',
                '4030635002991',
            ]))
        ) ? TRUE : FALSE;
    }

    //

    private function analyseIdDev($dev_name)
    {
        switch ($dev_name) {
            case 'BOW' :
                return 200;
            case 'Aircraft®' :
                return 202;
            case 'Cleancraft' :
                return 228;
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

    function setSyncProdName()
    {
        if (isset($this->shopItem['MANUFACTURER']) && isset($this->shopItem['PRODUCTNO'])) {
            $ai = new \ArrayIterator();
            $ai->append((string)trim(ucwords(strtolower(str_replace('®', '', $this->shopItem['MANUFACTURER'])))));
            $ai->append((string)trim($this->shopItem['PRODUCTNO']));
            $this->syncProdName = implode(' ', $ai->getArrayCopy());
        }
    }

    function setSyncProdDesc()
    {
        if (isset($this->shopItem['PRODUCTNAME'])) {
            $this->syncProdDesc = (string)$this->shopItem['PRODUCTNAME'];
        }
    }

    function setSyncItemsCodeProduct()
    {
        if (isset($this->shopItem['PRODUCTNO'])) {
            $this->syncItemsCodeProduct = (string)$this->shopItem['PRODUCTNO'];
        }
    }

    public function setSyncItemsCodeEan()
    {
        if (isset($this->shopItem['EAN'])) {
            $this->syncItemsCodeEan = (string)$this->shopItem['EAN'];
        }
    }

    public function setSyncCategoryText()
    {
        if (isset($this->shopItem['CATEGORYID']) || isset($this->shopItem['CATEGORY'])) {
            $ai = new \ArrayIterator();

            if (isset($this->shopItem['CATEGORYID'])) {
                $ai->append($this->shopItem['CATEGORYID']);
            }

            if (isset($this->shopItem['CATEGORY'])) {
                $ai->append((string)$this->shopItem['CATEGORY']);
            }

            $this->syncCategoryText = implode(' | ', $ai->getArrayCopy());
        }
    }

    public function setSyncItemsAvailabilityCount()
    {
        if (isset($this->shopItem['INSTOCK'])) {
            if ($this->shopItem['INSTOCK'] == 'ano') {
                $this->syncItemsAvailabilityCount = 1;
            } elseif ($this->shopItem['INSTOCK'] == 'ne') {
                $this->syncItemsAvailabilityCount = 0;
            }
        }
    }

    function setSyncItemsPriceStandard()
    {
        if (isset($this->shopItem['PRICE'])) {
            $price = array_filter((array)$this->shopItem['PRICE']);
            if (isset($price['COMMON']) && intval($price['COMMON']) > 0) {
                $this->syncItemsPriceStandard = round(doubleval($price['COMMON'] * self::DPH));
            }
        }
    }

    function setSyncItemsPriceAction()
    {
        if (isset($this->shopItem['PRICE'])) {
            $price = array_filter((array)$this->shopItem['PRICE']);
            if (isset($price['ACTION']) && intval($price['ACTION']) > 0) {
                $this->syncItemsPriceAction = round(doubleval($price['ACTION'] * self::DPH));
            }
        }
    }

    public function setSyncIdDev()
    {
        if (isset($this->shopItem['MANUFACTURER'])) {
            $this->syncIdDev = $this->analyseIdDev($this->shopItem['MANUFACTURER']);
        }
    }

    function storeImages()
    {
        if (isset($this->shopItem['PHOTOS'])) {

            $images = array_filter((array)$this->shopItem['PHOTOS']);
            $dir = $images["@attributes"]["PATH"];
            unset($images["@attributes"]);

            foreach ($images as $img) {
                if (is_array($img)) {
                    foreach ($img as $i) {
                        $this->storeArray->setImg($dir . $i);
                    }
                } else {
                    $this->storeArray->setImg($dir . $img);
                }
            }
        }
    }

    function storeAccessory()
    {
        if (isset($this->shopItem['RECOMMENDEDACCESSORIES'])) {
            $recom = array_filter((array)$this->shopItem['RECOMMENDEDACCESSORIES']);
            foreach ($recom as $rec) {
                if (is_array($rec)) {
                    foreach ($rec as $r) {
                        $this->storeArray->setAccessory($r);
                    }
                } else {
                    $this->storeArray->setAccessory($rec);
                }
            }
        }
    }

    function setSyncProdWeight()
    {
        // TODO: Implement setSyncProdWeight() method.
    }

    function setSyncWarranty()
    {
        // TODO: Implement setSyncWarranty() method.
    }

    function setSyncUrl()
    {
        // TODO: Implement setSyncUrl() method.
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
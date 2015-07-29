<?php namespace Authority\Runner\Task\Store;

class RunGarland extends AbstractRunDev implements iItem
{
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
            (!in_array($this->getSyncItemsCodeProduct(), ['41498', '196-972A678', '13A326SC600', '21D-20MI678', '21D-25MJ678', '2200207'])) &&
            (!in_array($this->getSyncItemsCodeEan(),['4892210800121']))
        ) ? TRUE : FALSE;
    }

    public function setSyncIdDev()
    {
        if (isset($this->shopItem['DRUH'])) {
            $this->syncIdDev = $this->analyseIdDev($this->shopItem['DRUH']);
        }
    }

    private function analyseIdDev($dev_name)
    {
        switch ($dev_name) {
            case 'AgriFab' :
                return 702;
            case 'Arnold (MTD)' :
                return 704;
            case 'Biocin' :
                return 706;
            case 'Britech' :
                return 708;
            case '100 Cub Cadet' :
                return 710;
            case 'DWT - naradi' :
                return 712;
            case 'ELPUMPS' :
                return 714;
            case 'GTM' :
                return 716;
            case 'Greenworks' :
                return 718;
            case 'Homelite' :
                return 720;
            case 'Kity' :
                return 722;
            case 'Marunaka' :
                return 724;
            case 'Michelin' :
                return 726;
            case '616 MTD' :
            case '600 MTD Europe Silver Line' :
            case '678 MTD Europe' :
                return 728;
            case 'Palram' :
                return 730;
            case 'RYOBI - naradi' :
            case 'RYOBI - zahrada' :
                return 732;
            case 'Riwall' :
            case 'Riwall PRO' :
                return 734;
            case 'Sandri Garden' :
                return 736;
            case 'Scheppach' :
            case 'Scheppach classic' :
            case 'Scheppach special edition' :
                return 738;
//			case 'Silky' : BEREME OD IGM
//				return 0;
            case 'TurfMaster' :
                return 742;
            case 'Woodster' :
                return 744;
            default :
                return 0;
        }
    }

    public function setSyncCategoryText()
    {
        if (isset($this->shopItem['SKUPINA'])) {
            $this->syncCategoryText = (string)$this->shopItem['SKUPINA'];
        }
    }

    public function setSyncItemsAvailabilityCount()
    {
        if (isset($this->shopItem['STAVVOLNY']) && intval($this->shopItem['STAVVOLNY']) > 0) {
            $this->syncItemsAvailabilityCount = intval($this->shopItem['STAVVOLNY']);
        }
    }

    public function setSyncItemsCodeEan()
    {
        if (isset($this->shopItem['EAN'])) {
            $this->syncItemsCodeEan = (string)trim($this->shopItem['EAN']);
        }
    }

    public function setSyncItemsCodeProduct()
    {
        if (isset($this->shopItem['ID'])) {
            $this->syncItemsCodeProduct = (string)trim($this->shopItem['ID']);
        }
    }

    public function setSyncItemsPriceStandard()
    {
        $prodej6 = doubleval($this->shopItem['PRODEJ6']) * self::DPH;
        if ($prodej6 > 0) {
            $this->syncItemsPriceStandard = round($prodej6);
        } else {
            $this->syncItemsPriceStandard = round(doubleval($this->shopItem['PRODEJ_DPH']));
        }
    }

    public function setSyncProdName()
    {
        if (isset($this->shopItem['NAZEV'])) {
            $this->syncProdName = (string)trim($this->shopItem['NAZEV']);
        }
    }

    public function setSyncProdDesc()
    {
        if (isset($this->shopItem['POPIS'])) {
            $this->syncProdDesc = (string)trim(str_replace(";", "", $this->shopItem['POPIS']));
        }
    }

    function setSyncProdImgSourceArray()
    {
        if (isset($this->shopItem['NAHLED_BIG']) && $this->shopItem['NAHLED_BIG'] != 'http://data.garland.cz/images/not_image.png') {
            $this->syncProdImgSourceArray = (array)$this->shopItem['NAHLED_BIG'];
        }
    }

    function setSyncProdWeight()
    {
        if (isset($this->shopItem['HMOTNOST'])) {
            $this->syncProdWeight = round(doubleval($this->shopItem['HMOTNOST']), 2);
        }
    }

    function setSyncUrl()
    {
        // TODO: Implement setSyncUrl() method.
    }

    function setSyncProdAccessorySourceArray()
    {
        // TODO: Implement setSyncProdAccessorySourceArray() method.
    }

    function setSyncItemsPriceAction()
    {
        // TODO: Implement setSyncItemsPriceAction() method.
    }

    function setSyncWarranty()
    {
        // TODO: Implement setSyncWarranty() method.
    }

    function setSyncProdFileSourceArray()
    {
        // TODO: Implement setSyncProdFileSourceArray() method.
    }

    function storeImages()
    {
        // TODO: Implement storeImages() method.
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
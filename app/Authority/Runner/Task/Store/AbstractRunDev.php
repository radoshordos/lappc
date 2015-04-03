<?php namespace Authority\Runner\Task\Store;

use Authority\Tools\Import\TotalSyncImport;

abstract class AbstractRunDev implements iItem
{
    const DPH = 1.21;
    protected $shopItem;
    protected $recordId;
    protected $syncIdDev;
    protected $syncProdName;
    protected $syncProdDesc;
    protected $syncProdWeight;

    protected $syncItemsCodeProduct;
    protected $syncItemsCodeEan;
    protected $syncItemsPriceStandard;
    protected $syncItemsPriceAction;
    protected $syncItemsAvailabilityCount;
    protected $syncCategoryText;
    protected $syncWarranty;
    protected $syncUrl;

    protected $storeArray;

    private $counterAll = 0;
    private $counterSync = 0;

    public function __construct($shop_item, $record_id)
    {
        $this->shopItem = $shop_item;
        $this->recordId = $record_id;
        $this->initSetters();
    }

    protected function initSetters()
    {
        $this->setSyncIdDev();
        $this->setSyncProdName();
        $this->setSyncProdDesc();
        $this->setSyncItemsAvailabilityCount();
        $this->setSyncItemsCodeProduct();
        $this->setSyncItemsCodeEan();
        $this->setSyncItemsPriceStandard();
        $this->setSyncItemsPriceAction();
        $this->setSyncProdWeight();
        $this->setSyncWarranty();
        $this->setSyncCategoryText();
        $this->setSyncUrl();
        $this->setStoreArray();
    }

    public function Windows1250toUtf8($text)
    {
        return iconv("windows-1250", "UTF-8", $text);
    }

    public function isUseRequired()
    {
        return ((strlen($this->getSyncItemsCodeProduct()) > 1) && (strlen($this->getSyncProdName()) > 1) && (intval($this->getSyncIdDev()) > 0) && (intval($this->getSyncItemsPriceStandard()) > 19)) ? TRUE : FALSE;
    }

    public function getSyncItemsCodeProduct()
    {
        return $this->syncItemsCodeProduct;
    }

    public function getSyncProdName()
    {
        return $this->syncProdName;
    }

    public function getSyncIdDev()
    {
        return $this->syncIdDev;
    }

    public function getSyncItemsPriceStandard()
    {
        return $this->syncItemsPriceStandard;
    }

    public function addCounterAll()
    {
        return $this->counterAll++;
    }

    public function addCounterSync()
    {
        return $this->counterSync++;
    }

    public function getCounterAll()
    {
        return $this->counterAll;
    }

    public function getCounterSync()
    {
        return $this->counterSync;
    }

    public function insertData2Db()
    {
        $tsi = new TotalSyncImport($this->getAllValues(), $this->getSyncProdImgSourceArray(), $this->getSyncProdAccessorySourceArray(), $this->getSyncProdMediaSourceArray());
        return $tsi->insertData2SyncDb();
    }

    public function getSyncItemsCodeEan()
    {
        return $this->syncItemsCodeEan;
    }

    public function getAllValues()
    {
        return [
            'purpose'            => 'autosync',
            'record_id'          => $this->getRecordId(),
            'dev_id'             => $this->getSyncIdDev(),
            'name'               => $this->getSyncProdName(),
            'desc'               => $this->getSyncProdDesc(),
            'price_standard'     => $this->getSyncItemsPriceStandard(),
            'price_action'       => $this->getSyncItemsPriceAction(),
            'availability_count' => $this->getSyncItemsAvailabilityCount(),
            'code_ean'           => $this->getSyncItemsCodeEan(),
            'code_prod'          => $this->getSyncItemsCodeProduct(),
            'weight'             => $this->getSyncProdWeight(),
            'warranty'           => $this->getSyncWarranty(),
            'categorytext'       => $this->getSyncCategoryText(),
            'url'                => $this->getSyncUrl(),
            'store_array'        => $this->getStoreArray()
        ];
    }

    public function getRecordId()
    {
        return $this->recordId;
    }

    public function getSyncProdDesc()
    {
        return $this->syncProdDesc;
    }

    public function getSyncItemsPriceAction()
    {
        return $this->syncItemsPriceAction;
    }

    public function getSyncProdWeight()
    {
        return $this->syncProdWeight;
    }

    public function getSyncItemsAvailabilityCount()
    {
        return $this->syncItemsAvailabilityCount;
    }

    public function getSyncCategoryText()
    {
        return $this->syncCategoryText;
    }

    public function getSyncWarranty()
    {
        return $this->syncWarranty;
    }

    public function getSyncUrl()
    {
        return $this->syncUrl;
    }

    public function getShopItem()
    {
        return $this->shopItem;
    }

    public function getStoreArray()
    {
        return $this->storeArray;
    }
}
<?php namespace Authority\Runner\Task\Store;

use Authority\Eloquent\SyncDb;

abstract class AbstractRunDev
{
    const DPH = 1.21;

    protected $shopItem;
    protected $recordId;
    protected $syncIdDev;
    protected $syncProdName;
    protected $syncProdDesc;
    protected $syncItemsCodeProduct;
    protected $syncItemsCodeEan;
    protected $syncItemsPriceStandard;
    protected $syncItemsPriceAction;
    protected $syncItemsAvailabilityCount;
    protected $syncCommonGroup;
    protected $syncProdImgSource;
    private $counterAll = 0;
    private $counterSync = 0;

    public function __construct($shopitem, $record_id)
    {
        $this->shopItem = $shopitem;
        $this->recordId = $record_id;
        $this->initSetters();
    }

    protected function initSetters()
    {
        $this->setSyncIdDev();
        $this->setSyncProdName();
        $this->setSyncProdDesc();
        $this->setSyncProdImgSource();
        $this->setSyncItemsAvailabilityCount();
        $this->setSyncItemsCodeProduct();
        $this->setSyncItemsCodeEan();
        $this->setSync();
        $this->setSyncCommonGroup();
    }

    public function Windows1250toUtf8($text)
    {
        return iconv("windows-1250", "UTF-8", $text);
    }

    public function isUseRequired()
    {
        return ((strlen($this->getSyncItemsCodeProduct()) > 0) && (strlen($this->getSyncProdName()) > 0) && (intval($this->getSyncIdDev()) > 0) && (intval($this->getSyncItemsPriceEnd()) > 19)) ? TRUE : FALSE;
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
        $column_id = intval(SyncDb::where('dev_id', '=', $this->getSyncIdDev())->where('code_prod', '=', $this->getSyncItemsCodeProduct())->orWhere('code_ean', '=', $this->getSyncItemsCodeEan())->pluck('id'));
        if ($column_id == 0) {
            return SyncDb::create(array_merge($this->getAllValues(), ['created_at' => date("Y-m-d H:i:s", strtotime('now'))]));
        } else {
            return SyncDb::where('id', '=', $column_id)->update($this->getAllValues());
        }
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
            'img_source'         => $this->getSyncProdImgSource(),
            'availability_count' => $this->getSyncItemsAvailabilityCount(),
            'code_ean'           => $this->getSyncItemsCodeEan(),
            'code_prod'          => $this->getSyncItemsCodeProduct(),
            'updated_at'         => $this->getSyncItemsPriceEnd(),
            'common_group'       => $this->getSyncCommonGroup(),
            'updated_at'         => date("Y-m-d H:i:s", strtotime('now'))
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

    public function getSyncItemsPriceStandard()
    {
        return $this->syncItemsPriceStandard;
    }

    public function getSyncItemsPriceAction()
    {
        return $this->syncItemsPriceAction;
    }

    public function getSyncProdImgSource()
    {
        return $this->syncProdImgSource;
    }

    public function getSyncItemsAvailabilityCount()
    {
        return $this->syncItemsAvailabilityCount;
    }

    public function getSyncCommonGroup()
    {
        return $this->syncCommonGroup;
    }

    public function getShopItem()
    {
        return $this->shopItem;
    }

}

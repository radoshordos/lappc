<?php namespace Authority\Runner\Task\Store;

abstract class AbstractRunDev
{
    const DPH = 1.21;

    protected $shopItem;
    protected $syncIdDev;
    protected $syncProdName;
    protected $syncProdDesc;
    protected $syncItemsCodeProduct;
    protected $syncItemsCodeEan;
    protected $syncItemsPriceEnd;
    protected $syncItemsAvailabilityCount;
    protected $syncCommonGroup;
    protected $syncProdImgSource;
    private $db;
    private $counterAll = 0;
    private $counterSync = 0;

    public function __construct($shopitem)
    {
        $this->shopItem = $shopitem;
        $this->db = Model_Zendb::myfactory();
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
        $this->setSyncItemsPriceEnd();
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

    public function getSyncItemsPriceEnd()
    {
        return $this->syncItemsPriceEnd;
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

        // User::firstOrCreate( array('id'=>1, 'name'=>'hey') );


        $bool = $this->db->fetchOne($this->db->select()->from('sync2items')->where('si_items_code_product = ?', $this->getSyncItemsCodeProduct()));
        if (intval($bool) == 0) {
            $this->db->insert("sync2items", array_merge($this->getAllValues(), ['si_cd_create' => new Zend_Db_Expr('CURDATE()')]));
        } else {
            $this->db->update("sync2items", $this->getAllValues(), [$this->db->quoteInto('si_items_code_product = ?', $this->getSyncItemsCodeProduct())]);
        }
    }

    public function getAllValues()
    {
        return [
            'si_id_mode'                 => 1,
            'si_id_store'                => 2,
            'si_actual'                  => 1,
            'si_prod_id_dev'             => $this->getSyncIdDev(),
            'si_prod_name'               => $this->getSyncProdName(),
            'si_prod_desc'               => $this->getSyncProdDesc(),
            'si_prod_img_source'         => $this->getSyncProdImgSource(),
            'si_prod_availability_count' => $this->getSyncItemsAvailabilityCount(),
            'si_items_code_ean'          => $this->getSyncItemsCodeEan(),
            'si_items_code_product'      => $this->getSyncItemsCodeProduct(),
            'si_items_price_end'         => $this->getSyncItemsPriceEnd(),
            'si_common_group'            => $this->getSyncCommonGroup()
        ];
    }

    public function getSyncProdDesc()
    {
        return $this->syncProdDesc;
    }

    public function getSyncProdImgSource()
    {
        return $this->syncProdImgSource;
    }

    public function getSyncItemsAvailabilityCount()
    {
        return $this->syncItemsAvailabilityCount;
    }

    public function getSyncItemsCodeEan()
    {
        return $this->syncItemsCodeEan;
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

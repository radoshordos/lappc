<?php namespace Authority\Runner\Task\Store;

class RunNarexCatalogue extends AbstractRunDev implements iItem
{
    protected $storeArray;

    public function __construct($arr_item, $record_id)
    {
        parent::__construct($arr_item, $record_id);
        $this->storeArray = new StoreArrayIterator();
        $this->storeArray->setMediaDescriptions($this->storeDescriptions());
    }

    function setSyncItemsCodeProduct()
    {
        if (isset($this->shopItem['ArtCode'])) {
            $this->syncItemsCodeProduct = (string)$this->shopItem['ArtCode'];
        }
    }

    function setSyncProdName()
    {
        if (isset($this->shopItem['ArtCode'])) {
            $this->syncProdName = "Narex " . (string)trim($this->shopItem['ArtCode']);
        }
    }

    function setSyncIdDev()
    {
        $this->syncIdDev = 10;
    }

    function setSyncProdDesc()
    {
        if (isset($this->shopItem['Product'])) {
            $this->syncProdDesc = (string)trim($this->shopItem['Product']);
        }
    }

    function setSyncCategoryText()
    {
        if (isset($this->shopItem['Group'])) {
            $this->syncCategoryText = $this->shopItem['Group']->Number . " - " . $this->shopItem['Group']->Name;
        }
    }

    function setSyncWarranty()
    {
        // TODO: Implement setSyncWarranty() method.
    }

    function setSyncUrl()
    {
        if (isset($this->shopItem['ProductUrl'])) {
            $this->syncUrl = (string)$this->shopItem['ProductUrl'];
        }
    }

    function setSyncProdImgSourceArray()
    {
        // TODO: Implement setSyncProdImgSourceArray() method.
    }

    function setSyncProdFileSourceArray()
    {
        // TODO: Implement setSyncProdFileSourceArray() method.
    }

    function setSyncItemsCodeEan()
    {
        // TODO: Implement setSyncItemsCodeEan() method.
    }

    function setSyncItemsPriceAction()
    {
        // TODO: Implement setSyncItemsPriceAction() method.
    }

    function setSyncItemsAvailabilityCount()
    {
        // TODO: Implement setSyncItemsAvailabilityCount() method.
    }

    function setSyncProdWeight()
    {
        // TODO: Implement setSyncProdWeight() method.
    }

    function setMediaDescriptions()
    {
        // TODO: Implement setMediaDescriptions() method.
    }

    function getMediaDescriptions()
    {
        // TODO: Implement getMediaDescriptions() method.
    }

    function setStoreArray()
    {


    }

    function setSyncItemsPriceStandard()
    {
        // TODO: Implement setSyncItemsPriceStandard() method.
    }

    //** STORE ARRAY PART **/


    public function storeDescriptions()
    {
        if (isset($this->shopItem['Descriptions'])) {
            foreach ((array)$this->shopItem['Descriptions'] as $row) {
                foreach ((array)$row as $val) {
                    if (!empty($val)) {

                        $this->storeArray->setMediaDescriptions(filter_var($val, FILTER_SANITIZE_MAGIC_QUOTES));

                        // mb_convert_encoding($nonutf8 , 'UTF-8', 'UTF-8');
                        //$this->storeArray->setMediaDescriptions(str_replace('»', '', iconv("UTF-8", "UTF-8//IGNORE", $val)));
                    }
                }
            }
        }
    }
}
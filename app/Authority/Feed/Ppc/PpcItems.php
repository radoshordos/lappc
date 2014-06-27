<?php

namespace Authority\Feed\Ppc;

class PpcItems
{
    private $itemId;
    private $devId;
    private $treeId;
    private $productName;
    private $url;
    private $priceVat;
    private $action;
    private $market;
    private $send;

    public function __construct(\SimpleXMLElement $simpleXMLElement)
    {
        $this->setItemId($simpleXMLElement);
        $this->setProductName($simpleXMLElement);
        $this->setUrl($simpleXMLElement);
        $this->setPricevat($simpleXMLElement);
        $this->setManufacturerId($simpleXMLElement);
    }

    public function setItemId(\SimpleXMLElement $simpleXMLElement)
    {
        if ($simpleXMLElement->ITEM_ID) {
            $this->itemId = (int)$simpleXMLElement->ITEM_ID;
        }
    }

    public function setProductName(\SimpleXMLElement $simpleXMLElement)
    {
        if ($simpleXMLElement->PRODUCTNAME) {
            $this->productName = (string)$simpleXMLElement->PRODUCTNAME;
        }
    }

    public function setUrl(\SimpleXMLElement $simpleXMLElement)
    {
        if ($simpleXMLElement->URL) {
            $this->url = (string)$simpleXMLElement->URL;
        }
    }

    public function setPriceVat(\SimpleXMLElement $simpleXMLElement)
    {
        if ($simpleXMLElement->PRICE_VAT) {
            $this->priceVat = (string)$simpleXMLElement->PRICE_VAT;
        }
    }

    public function setManufacturer(\SimpleXMLElement $simpleXMLElement)
    {
        if ($simpleXMLElement->MANUFACTURER) {
            $this->manufacturer = (string)$simpleXMLElement->MANUFACTURER;
        }
    }

    public function getAllArray()
    {
/*
         $this->itemId;
         $this->productName;
         $this->product;
         $this->url;
         $this->priceVat;
         $this->manufacturer;
*/
        return array(
            'item_id' => $this->itemId;
            'name' =>
            'price' =>
            'manufacturer' => $this->manufacturer;
        );


    }

    /**
     * @return mixed
     */
    public function getItemId()
    {
        return $this->itemId;
    }

    /**
     * @return mixed
     */
    public function getManufacturer()
    {
        return $this->manufacturer;
    }

    /**
     * @return mixed
     */
    public function getPriceVat()
    {
        return $this->priceVat;
    }

    /**
     * @return mixed
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * @return mixed
     */
    public function getProductName()
    {
        return $this->productName;
    }

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }
}
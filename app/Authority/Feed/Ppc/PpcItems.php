<?php

namespace Authority\Feed\Ppc;

class PpcItems
{
    private $productName;
    private $product;
    private $url;
    private $imgUrl;
    private $priceVat;
    private $manufacturer;

    public function __construct(\SimpleXMLElement $simpleXMLElement)
    {
        $this->setProduct($simpleXMLElement);
        $this->setImageurl($simpleXMLElement);
        $this->setUrl($simpleXMLElement);
        $this->setPricevat($simpleXMLElement);
        $this->setManufacturer($simpleXMLElement);
    }

    public function setProductName(\SimpleXMLElement $simpleXMLElement)
    {
        if ($simpleXMLElement->PRODUCTNAME) {
            $this->productName = (string)$simpleXMLElement->PRODUCTNAME;
        }
    }

    public function setProduct(\SimpleXMLElement $simpleXMLElement)
    {
        if ($simpleXMLElement->PRODUCT) {
            $this->product = (string)$simpleXMLElement->PRODUCT;
        }
    }

    public function setUrl(\SimpleXMLElement $simpleXMLElement)
    {
        if ($simpleXMLElement->URL) {
            $this->url = (string)$simpleXMLElement->URL;
        }
    }

    public function setImageUrl(\SimpleXMLElement $simpleXMLElement)
    {
        if ($simpleXMLElement->IMGURL) {
            $this->imgUrl = (string)$simpleXMLElement->IMGURL;
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

    /**
     * @return mixed
     */
    public function getImgUrl()
    {
        return $this->imgUrl;
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
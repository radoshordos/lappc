<?php

namespace Authority\Xml;

class FeedShopitem
{
    private $product;
    private $url;
    private $imgurl;
    private $pricevat;
    private $manufacturer;

    public function __construct(\SimpleXMLElement $simpleXMLElement)
    {
        $this->setProduct($simpleXMLElement);


        $this->setImageurl($simpleXMLElement);
        $this->setUrl($simpleXMLElement);
        $this->setPricevat($simpleXMLElement);
        $this->setManufacturer($simpleXMLElement);
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

    public function setImageurl(\SimpleXMLElement $simpleXMLElement)
    {
        if ($simpleXMLElement->IMGURL) {
            $this->imgurl = (string)$simpleXMLElement->IMGURL;
        }
    }

    public function setPricevat(\SimpleXMLElement $simpleXMLElement)
    {
        if ($simpleXMLElement->PRICE_VAT) {
            $this->pricevat = (string)$simpleXMLElement->PRICE_VAT;
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
    public function getImgurl()
    {
        return $this->imgurl;
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
    public function getPricevat()
    {
        return $this->pricevat;
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
    public function getUrl()
    {
        return $this->url;
    }

}
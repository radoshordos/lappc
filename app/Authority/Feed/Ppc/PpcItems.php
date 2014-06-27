<?php

namespace Authority\Feed\Ppc;

class PpcItems
{
    private $itemId;
    private $devId;
    private $treeId;
    private $name;
    private $url;
    private $price;
    private $market;
    private $action;
    private $send;

    public function __construct(\SimpleXMLElement $simpleXMLElement)
    {
        $this->setItemId($simpleXMLElement);
        $this->setDevId($simpleXMLElement);
        $this->setTreeId($simpleXMLElement);
        $this->setName($simpleXMLElement);
        $this->setUrl($simpleXMLElement);
        $this->setPrice($simpleXMLElement);
        $this->setMarket($simpleXMLElement);
        $this->setAction($simpleXMLElement);
        $this->setSend($simpleXMLElement);
    }

    public function setItemId(\SimpleXMLElement $simpleXMLElement)
    {
        if ($simpleXMLElement->ITEM_ID) {
            $this->itemId = (int)$simpleXMLElement->ITEM_ID;
        }
    }

    public function setDevId(\SimpleXMLElement $simpleXMLElement)
    {
        if ($simpleXMLElement->DEV_ID) {
            $this->devId = (int)$simpleXMLElement->DEV_ID;
        }
    }

    public function setTreeId(\SimpleXMLElement $simpleXMLElement)
    {
        if ($simpleXMLElement->TREE_ID) {
            $this->treeId = (int)$simpleXMLElement->TREE_ID;
        }
    }

    public function setName(\SimpleXMLElement $simpleXMLElement)
    {
        if ($simpleXMLElement->PRODUCTNAME) {
            $this->name = (string)$simpleXMLElement->PRODUCTNAME;
        }
    }

    public function setUrl(\SimpleXMLElement $simpleXMLElement)
    {
        if ($simpleXMLElement->URL) {
            $this->url = (string)$simpleXMLElement->URL;
        }
    }

    public function setPrice(\SimpleXMLElement $simpleXMLElement)
    {
        if ($simpleXMLElement->PRICE_VAT) {
            $this->price = (string)$simpleXMLElement->PRICE_VAT;
        }
    }

    public function setMarket(\SimpleXMLElement $simpleXMLElement)
    {
        if ($simpleXMLElement->ISMARKET) {
            $this->market = (int)$simpleXMLElement->ISMARKET;
        }
    }

    public function setAction(\SimpleXMLElement $simpleXMLElement)
    {
        if ($simpleXMLElement->ISACTION) {
            $this->action = (int)$simpleXMLElement->ISACTION;
        }
    }

    public function setSend(\SimpleXMLElement $simpleXMLElement)
    {
        if ($simpleXMLElement->ISSEND) {
            $this->send = (int)$simpleXMLElement->ISSEND;
        }
    }

    public function getAllArray()
    {
        return array(
            'item_id' => $this->itemId,
            'dev_id' => $this->devId,
            'tree_id' => $this->treeId,
            'url' => $this->url,
            'name' => $this->name,
            'price' => $this->price,
            'market' => $this->market,
            'action' => $this->action,
            'send' => $this->send
        );
    }

    /**
     * @return mixed
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * @return mixed
     */
    public function getDevId()
    {
        return $this->devId;
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
    public function getMarket()
    {
        return $this->market;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @return mixed
     */
    public function getSend()
    {
        return $this->send;
    }

    /**
     * @return mixed
     */
    public function getTreeId()
    {
        return $this->treeId;
    }

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }

}
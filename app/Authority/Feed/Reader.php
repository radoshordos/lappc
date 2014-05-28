<?php

namespace Authority\Feed;

class XmlReader
{

    protected $count = 0;
    protected $arr = array();

    public function __construct($xmlSource)
    {
        $xml = simplexml_load_string($xmlSource);
        if ($xml) {
            foreach ($xml as $val) {
                $this->arr[$this->count++] = new FeedShopItem($val);
            }
        }
    }

    /**
     * @return int
     */
    public function getCount()
    {
        return $this->count;
    }


    /**
     * @return array
     */
    public function getArr()
    {
        return $this->arr;
    }

}
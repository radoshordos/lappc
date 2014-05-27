<?php

namespace Authority\Xml;

class FeedReader
{

    protected $count = 0;
    protected $arr = array();

    public function __construct($xmlSource)
    {
        $xml = simplexml_load_string($xmlSource);
        if ($xml) {
            foreach ($xml as $val) {
                $this->arr[$this->count++] = new FeedShopitem($val);
            }
        }
    }

    /**
     * @return array
     */
    public function getArr()
    {
        return $this->arr;
    }

    /**
     * @return int
     */
    public function getCount()
    {
        return $this->count;
    }
}
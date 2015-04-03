<?php

namespace Authority\Runner\Task\Store;

class StoreArrayIterator
{
    private $sai;
    private $i = 0;

    function __construct()
    {
        $this->sai = ['accessory', 'img', 'media' => ['doc', 'pdf', 'jpg', 'youtube', 'parameters', 'descriptions', 'packagecontents']];
    }

    public function setAccessory($line)
    {
        $this->sai['accessory'][$this->i++] = $line;
    }

    public function setImg($line)
    {
        $this->sai['img'][$this->i++] = $line;
    }

    public function setMediaDoc($line)
    {
        $this->sai['media']['doc'][$this->i++] = $line;
    }

    public function setMediaPdf($line)
    {
        $this->sai['media']['pdf'][$this->i++] = $line;
    }

    public function setMediaJpg($line)
    {
        $this->sai['media']['jpg'][$this->i++] = $line;
    }

    public function setMediaYoutube($line)
    {
        $this->sai['media']['youtube'][$this->i++] = $line;
    }

    public function setMediaParameters($line)
    {
        $this->sai['media']['parameters'][$this->i++] = $line;
    }

    public function setMediaDescriptions($line)
    {
        $this->sai['media']['descriptions'][$this->i++] = $line;
    }

    public function setMediaPackagecontents($line)
    {
        $this->sai['media']['packagecontents'][$this->i++] = $line;
    }

    public function getStoreArray()
    {
        return $this->sai;
    }

    public function getCounter()
    {
        return $this->i;
    }
}
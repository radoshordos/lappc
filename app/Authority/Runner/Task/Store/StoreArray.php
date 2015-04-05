<?php namespace Authority\Runner\Task\Store;

class StoreArray
{
    private $sai = [];
    private $i = 0;
    private $img_count = 0;

    public function setAccessory($line)
    {
        $this->sai['accessory'][$this->i++] = $line;
    }

    public function setImg($line)
    {
        $this->img_count++;
        $this->sai['img'][$this->i++] = $line;
    }

    public function setMediaDoc($line)
    {
        $this->sai['doc'][$this->i++] = $line;
    }

    public function setMediaPdf($line)
    {
        $this->sai['pdf'][$this->i++] = $line;
    }

    public function setMediaJpg($line)
    {
        $this->sai['jpg'][$this->i++] = $line;
    }

    public function setMediaYoutube($line)
    {
        $this->sai['youtube'][$this->i++] = $line;
    }

    public function setMediaParameters($line)
    {
        $this->sai['parameters'][$this->i++] = $line;
    }

    public function setMediaDescriptions($line)
    {
        $this->sai['descriptions'][$this->i++] = $line;
    }

    public function setMediaPackagecontents($line)
    {
        $this->sai['packagecontents'][$this->i++] = $line;
    }

    public function getStoreArray()
    {
        return $this->sai;
    }

    public function getCounter()
    {
        return $this->i;
    }

    public function getImgCount()
    {
        return $this->img_count;
    }
}
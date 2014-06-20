<?php

class DumpPpc extends DumpUniverzal
{

    function __construct()
    {
        parent::__construct();
    }

    public function tagTollFree(Model_ViewProd $row)
    {
        if ($row->getProdIdMode() != 4) {
            return XMLExtWriter::writeLineFull("TOLLFREE", null, "1");
        }
    }

    protected function tagProductName(Model_ViewProd $row)
    {
        return XMLExtWriter::writeLineFull("PRODUCTNAME", null, $row->getProdNameFullWithBonusTitle($this->getListDiffValues(), "/"), 2);
    }

    protected function tagProductNameText(Model_ViewProd $row)
    {
        return XMLExtWriter::writeLineFull("PRODUCTNAMEEXT", null, $row->getProdDesc(), 2);
    }


    protected function tagItemId(Model_ViewProd $row)
    {
        return XMLExtWriter::writeLineFull("ITEM_ID", null, $row->getProdId());
    }

    function getFeed($items2Directory)
    {

        $i = 0;
        $prod = array();

        if (!empty($items2Directory)) {
            foreach ($items2Directory as $one_prod) {

                $row = new Model_ViewProd($one_prod);
                $prod[$i++][] = "<SHOPITEM>";
                $prod[$i][] = $this->tagItemId($row);
                $prod[$i][] = $this->tagProduct($row);
                $prod[$i][] = $this->tagProductName($row);
                $prod[$i][] = $this->tagDescription($row);
                $prod[$i][] = $this->tagManufactuer($row);
                $prod[$i][] = $this->tagUrl($row);
                $prod[$i][] = $this->tagImgurl($row);
                $prod[$i][] = $this->tagPrice($row);
                $prod[$i][] = $this->tagPriceVat($row);
                $prod[$i][] = $this->tagDeliveryDate($row);
                $prod[$i][] = $this->tagTollFree($row);
                $prod[$i][] = $this->tagManufactuer($row);
                $prod[$i][] = $this->tagCategotyText($row);
                $prod[$i][] = "</SHOPITEM>";
            }
        }
        return $prod;
    }

}
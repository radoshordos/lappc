<?php namespace Authority\Mapper;

class CreateProdModel
{

    private $prod_tree_id;
    private $prod_dev_id;
    private $prod_mode_id;
    private $prod_sale_id;
    private $prod_difference_id;
    private $prod_warranty_id;
    private $prod_forex_id;
    private $prod_price;
    private $prod_alias;
    private $prod_name;
    private $prod_desc;
    private $prod_storeroom;
    private $prod_transport_weight;
    private $prod_transport_atypical;
    private $prod_search_alias;
    private $prod_search_codes;
    private $prod_search_price;
    private $prod_search_sell;
    private $prod_img_big;
    private $prod_img_normal;
    private $items_availability_id;
    private $items_code_prod;
    private $items_code_ean;
    private $prod_picture_img_big;
    private $prod_picture_img_normal;

    /**
     * @return mixed
     */
    public function getProdDevId()
    {
        return $this->prod_dev_id;
    }

    /**
     * @param mixed $prod_dev_id
     */
    public function setProdDevId($prod_dev_id)
    {
        $this->prod_dev_id = $prod_dev_id;
    }



    /**
     * @return mixed
     */
    public function getProdName()
    {
        return $this->prod_name;
    }

    /**
     * @param mixed $prod_name
     */
    public function setProdName($prod_name)
    {
        $this->prod_name = $prod_name;
    }

    /**
     * @return mixed
     */
    public function getProdDesc()
    {
        return $this->prod_desc;
    }

    /**
     * @param mixed $prod_desc
     */
    public function setProdDesc($prod_desc)
    {
        $this->prod_desc = $prod_desc;
    }

    /**
     * @return mixed
     */
    public function getItemsCodeProd()
    {
        return $this->items_code_prod;
    }

    /**
     * @param mixed $items_code_prod
     */
    public function setItemsCodeProd($items_code_prod)
    {
        $this->items_code_prod = $items_code_prod;
    }

    /**
     * @return mixed
     */
    public function getItemsCodeEan()
    {
        return $this->items_code_ean;
    }

    /**
     * @param mixed $items_code_ean
     */
    public function setItemsCodeEan($items_code_ean)
    {
        $this->items_code_ean = $items_code_ean;
    }

}
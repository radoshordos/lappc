<?php namespace Authority\Web\Prod;

use Authority\Eloquent\ProdDifference;
use Authority\Eloquent\ProdDifferenceM2nSet;
use Authority\Eloquent\ProdDifferenceSet;
use Authority\Eloquent\ProdDifferenceValues;

class Variations
{
    private $prod_difference_id;
    private $prod_difference_m2n_list;
    private $table_prod_difference;
    private $probably_items_variation_values = [];
    private $used_prod_difference_set;

    function __construct($prod_difference_id)
    {
        $this->prod_difference_id = $prod_difference_id;
    }

    public function getUsedProdDifferenceSet()
    {
        if ($this->prod_difference_id > 1 && is_null($this->used_prod_difference_set)) {
            $this->used_prod_difference_set = ProdDifferenceSet::whereIn('id', $this->getProdDifferenceM2nList())->get();
        }
        return $this->used_prod_difference_set;
    }

    public function getProdDifferenceM2nList()
    {
        if ($this->prod_difference_id > 1 && is_null($this->prod_difference_m2n_list)) {
            $this->prod_difference_m2n_list = ProdDifferenceM2nSet::select(['set_id'])->where('difference_id', '=', $this->prod_difference_id)->orderBy('id')->lists('set_id');
        }
        return $this->prod_difference_m2n_list;
    }

    public function getVariationsFromItem($item)
    {
        $values = $this->getProbablyItemsVariationValues();
        $count = $this->getCountDifferenceColumn();
        if ($count == 1) {
            var_dump($values[$item['diff_val1_id']]);
        } else if ($count == 2) {
            var_dump($values[$item['diff_val1_id']] . ", " . $values[$item['diff_val2_id']]);
        }
    }

    public function getProbablyItemsVariationValues()
    {
        if ($this->prod_difference_id > 1 && count($this->probably_items_variation_values) == 0) {
            $values = ProdDifferenceValues::select(['id', 'name'])->whereIn('set_id', $this->getProdDifferenceM2nList())->get()->toArray();
            foreach ($values as $val) {
                $this->probably_items_variation_values[$val['id']] = $val['name'];
            }
        }
        return $this->probably_items_variation_values;
    }

    public function getCountDifferenceColumn()
    {
        $tpd = $this->getTableProdDifference();
        return (isset($tpd["count"]) ? $tpd["count"] : 0);
    }

    public function getTableProdDifference()
    {
        if ($this->prod_difference_id > 1 && is_null($this->table_prod_difference)) {
            $this->table_prod_difference = ProdDifference::find($this->prod_difference_id)->toArray();
        }
        return $this->table_prod_difference;
    }

}
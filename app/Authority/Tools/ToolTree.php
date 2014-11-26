<?php namespace Authority\Tools;

use Authority\Eloquent\Tree;

class ToolTree
{
    static function calculateId($parent_id, $position)
    {
        if ($parent_id % 1000000 == 0) {
            return $parent_id + $position * 10000;
        } elseif ($parent_id % 10000 == 0) {
            return $parent_id + $position * 100;
        } elseif ($parent_id % 100 == 0) {
            return $parent_id + $position;
        }
    }

    static function calculateGroupId($id)
    {
        return substr($id, 0, 2);
    }

    public function getCategoryText($id)
    {
        $arr = [];
        if ($id % 1000000 != 0) {
            $arr[] = Tree::select('name')->where('id', '=', intval(intval($id / 1000000) * 1000000))->pluck('name');
        }
        if ($id % 10000 != 0) {
            $arr[] = Tree::select('name')->where('id', '=', intval(intval($id / 10000) * 10000))->pluck('name');
        }
        if ($id % 100 != 0) {
            $arr[] = Tree::select('name')->where('id', '=', intval(intval($id / 100) * 100))->pluck('name');
        }
        $arr[] = Tree::select('name')->where('id', '=', intval($id))->pluck('name');
        return implode(" | ", $arr);
    }

}

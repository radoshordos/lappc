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

    public function getCategoryNav($id)
    {
        $arr = [];
        if ($id % 1000000 != 0) {
            $deep3 = Tree::select('absolute','desc','name')->where('id', '=', intval(intval($id / 1000000) * 1000000))->first(['absolute','desc','name']);
            $arr[] = "<li><a title=\"".$deep3->desc."\" href=\"/".$deep3->absolute."\">".$deep3->name."</a></li>";
        }
        if ($id % 10000 != 0) {
            $deep2 = Tree::select('absolute','desc','name')->where('id', '=', intval(intval($id / 10000) * 10000))->first(['absolute','desc','name']);
            $arr[] = "<li><a title=\"".$deep2->desc."\" href=\"/".$deep2->absolute."\">".$deep2->name."</a></li>";
        }
        if ($id % 100 != 0) {
            $deep1 = Tree::select('absolute','desc','name')->where('id', '=', intval(intval($id / 100) * 100))->first(['absolute','desc','name']);
            $arr[] = "<li><a title=\"".$deep1->desc."\" href=\"/".$deep1->absolute."\">".$deep1->name."</a></li>";
        }
        $deep0 = Tree::select('absolute','desc','name')->where('id', '=', intval($id))->first(['absolute','desc','name']);
        $arr[] = "<li><a title=\"".$deep0->desc."\" href=\"/".$deep0->absolute."\">".$deep0->name."</a></li>";

        return implode("", $arr);
    }

}

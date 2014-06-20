<?php

namespace Authority\Tools;

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

}

<?php

namespace Authority\Eloquent;

class TreeGroup extends \Eloquent
{
    protected $table = 'tree_group';

    public function treeGroupTop()
    {
        return $this->hasOne('Authority\Eloquent\TreeGroupTop', 'id', 'grouptop_id');
    }
}
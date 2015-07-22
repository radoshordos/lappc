<?php namespace Authority\Web\Group;


use Authority\Eloquent\ViewTree;

class TreeGroup
{
    CONST TREE_GROUP_TYPE = 'treegroup';
    CONST TREE_BLADE_TEMPLATE = 'web.group';
    CONST TYPE_OF_TREE = 'group';

    private $view_tree_actual;

    public function __construct($view_tree_actual)
    {
        $this->view_tree_actual = $view_tree_actual;
    }

    public function getViewTreeActual()
    {
        return $this->view_tree_actual;
    }

    public function getPictureTree()
    {
        return ViewTree::select(['tree_name', 'tree_desc', 'tree_absolute', 'tree_picture'])
            ->where('tree_parent_id', '=', $this->view_tree_actual['tree_id'])
            ->where('tree_subdir_visible','>','0')
            ->where('tree_deep', '=', 1)->orderBy('tree_id')->get();
    }
}
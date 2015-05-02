<?php namespace Authority\Web\Group;

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
}
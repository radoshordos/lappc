<?php namespace Authority\Runner\Task\Recalculate;

use Authority\Eloquent\Tree;
use Authority\Runner\Task\iRun;
use Authority\Runner\Task\TaskMessage;
use Authority\Tools\ToolTree;

class TreeCategoryText extends TaskMessage implements iRun
{
    public function __construct($db)
    {
        parent::__construct($db);
        $this->run();
    }

    private function getTreeIdLists()
    {
        return Tree::select('tree.id AS tree_id')
            ->join('tree_group', 'tree.group_id', '=', 'tree_group.id')
            ->where('for_prod', '=', '1')
            ->orderBy('tree_id')
            ->lists('tree_id');
    }

    public function run()
    {
        foreach ($this->getTreeIdLists() as $id) {
            $tt = new ToolTree();
            $tree = Tree::find($id);
            $tree->category_text = $tt->getCategoryText($id);
            $tree->category_nav = $tt->getCategoryNav($id);
            $tree->save();
        }
        $this->addMessage("Text OK");
    }

}
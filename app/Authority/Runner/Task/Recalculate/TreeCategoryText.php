<?php namespace Authority\Runner\Task\Recalculate;

use Authority\Runner\Task\iRun;
use Authority\Runner\Task\TaskMessage;
use Authority\Eloquent\Tree;

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

            $tree = Tree::find($id);
            $tree->category_text = implode(" | ", $arr);
            $tree->save();
        }
        $this->addMessage("HOTOVO");
    }
}
<?php namespace Authority\Runner\Task\Recalculate;

use Authority\Eloquent\Tree;
use Authority\Eloquent\TreeDev;
use Authority\Runner\Task\iRun;
use Authority\Runner\Task\TaskMessage;

class TreeRecalculate extends TaskMessage implements iRun
{
    public function __construct($db)
    {
        parent::__construct($db);
        $this->run();
    }

    public function run()
    {
        $this->recalculateDirectory();
        $this->recalculateTreeWithProd();
        $this->recalculateTreeWithoutProd();
        $this->recalculateRootTree();
    }

    public function recalculateDirectory()
    {
        $arr = [];
        $l1 = Tree::select('*')->whereIn('deep', ['0', '1'])->get();
        $l2 = Tree::select('*')->where('deep', '=', '2')->get();
        $l3 = Tree::select('*')->where('deep', '=', '3')->get();

        foreach ($l1 as $key => $value) {
            $arr[$value->id] = $value->relative;
        }

        foreach ($l2 as $key => $value) {
            if (isset($arr[$value->parent_id])) {
                $arr[$value->id] = implode('/', [$arr[$value->parent_id], $value->relative]);
            } else {
                throw new \Exception("BAD DIR L2");
            }
        }

        foreach ($l3 as $key => $value) {
            if (isset($arr[$value->parent_id])) {
                $arr[$value->id] = implode('/', [$arr[$value->parent_id], $value->relative]);
            } else {
                throw new \Exception("BAD DIR L3");
            }
        }

        foreach ($arr as $k => $v) {
            $tree = Tree::find($k);
            $tree->absolute = $v;
            $tree->save();
        }
    }

    public function recalculateTreeWithoutProd()
    {
        $tree = Tree::select('tree.id AS tree_id')
            ->join('tree_group', 'tree.group_id', '=', 'tree_group.id')
            ->where('tree_group.type', '!=', 'prodlist')
            ->get();

        if (!empty($tree)) {
            foreach ($tree as $row) {
                $count = TreeDev::where('dev_id', '=', 1)->where('tree_id', '=', $row->tree_id)->count();
                if ($count === 0) {
                    TreeDev::create([
                        'tree_id'     => $row->tree_id,
                        'dev_id'      => 1,
                        'dir_all'     => 1,
                        'dir_visible' => 1
                    ]);
                }
            }
        }
    }

    public function recalculateRootTree()
    {
        $tree = Tree::select('tree.id AS tree_id')
            ->join('tree_group', 'tree.group_id', '=', 'tree_group.id')
            ->whereRaw('tree.id = tree.parent_id')
            ->where('tree_group.type', '=', 'prodlist')
            ->where('tree.deep', '=', '0')
            ->get();

        if (!empty($tree)) {
            foreach ($tree as $row) {
                $count = TreeDev::where('dev_id', '=', 1)->where('tree_id', '=', $row->tree_id)->count();
                if ($count === 0) {
                    TreeDev::create([
                        'tree_id'     => $row->tree_id,
                        'dev_id'      => 1,
                        'dir_all'     => 1,
                        'dir_visible' => 1
                    ]);
                }
            }
        }
    }

    public function recalculateTreeWithProd()
    {
        \DB::statement('CALL proc_tree_recalculate');
        $this->addMessage("Zavolán přepočet skupin (TREE)");
    }
}
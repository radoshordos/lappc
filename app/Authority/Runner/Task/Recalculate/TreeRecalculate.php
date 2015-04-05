<?php namespace Authority\Runner\Task\Recalculate;

use Authority\Eloquent\Tree;
use Authority\Eloquent\TreeDev;
use Authority\Runner\Task\iRun;
use Authority\Runner\Task\TaskMessage;
use Authority\Tools\ToolTree;

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
        $this->recalculateNavAndText();
        $this->recalculateLeftMenu();
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

    public function recalculateNavAndText()
    {
        foreach ($this->getTreeIdLists() as $id) {
            $tt = new ToolTree();
            $tree = Tree::find($id);
            $tree->category_text = $tt->getCategoryText($id);
            $tree->category_nav = $tt->getCategoryNav($id);
            $tree->save();
        }
    }

    private function getTreeIdLists()
    {
        return Tree::select('tree.id AS tree_id')
            ->join('tree_group', 'tree.group_id', '=', 'tree_group.id')
            ->orderBy('tree_id')
            ->lists('tree_id');
    }

    protected function recalculateLeftMenu()
    {
        $uris = Tree::select(['id', 'group_id', 'absolute'])->orderBy('id')->get();
        foreach ($uris as $uri) {
            $html = "";
            $euri = explode('/', $uri->absolute);
            $html .= "<ul>";
            foreach ([16, 19, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 32] as $val) {
                $root = Tree::select(['id', 'name', 'desc', 'group_id', 'absolute'])->where('group_id', '=', $val)->where('deep', '=', '0')->first();
                if ($root->group_id == $uri->group_id) {
                    $html .= "<li><a href=\"" . "/" . $root->absolute . "\" title=\"" . $root->desc . "\" class=\"sub-down\">" . $root->name . "</a><ul>";
                    $ar1 = Tree::select(['id', 'absolute', 'relative', 'name', 'desc', 'deep'])->where('group_id', '=', $val)->where('deep', '=', '1')->orderBy('id')->get()->toArray();
                    foreach ($ar1 as $value) {
                        $html .= "<li><a href=\"" . "/" . $value['absolute'] . "\" title=\"" . $value['desc'] . "\">" . $value['name'] . "</a>";
                        if (isset($euri[0]) && $euri[0] == $value['relative']) {
                            $ar2 = Tree::select(['id', 'absolute', 'relative', 'name', 'desc', 'deep'])->where('parent_id', '=', $value['id'])->where('deep', '=', '2')->where('group_id', '=', $val)->orderBy('id')->get()->toArray();
                            if (!empty($ar2)) {
                                $html .= '<ul>';
                                foreach ($ar2 as $k => $v) {
                                    $html .= "<li><a href=\"" . "/" . $v['absolute'] . "\" title=\"" . $v['desc'] . "\">" . $v['name'] . "</a>";
                                    if (isset($euri[1]) && $euri[1] == $v['relative']) {
                                        $ar3 = Tree::select(['id', 'absolute', 'relative', 'name', 'desc', 'deep'])->where('parent_id', '=', $v['id'])->where('deep', '=', '3')->where('group_id', '=', $val)->orderBy('id')->get()->toArray();
                                        if (!empty($ar3)) {
                                            $html .= '<ul>';
                                            foreach ($ar3 as $k3 => $v3) {
                                                $html .= "<li><a href=\"" . "/" . $v3['absolute'] . "\" title=\"" . $v3['desc'] . "\">" . $v3['name'] . '</a></li>';
                                            }
                                            $html .= '</ul>';
                                        }
                                        $html .= '</li>';
                                    } else {
                                        $html .= '</li>';
                                    }
                                }
                                $html .= '</ul>';
                            }
                            $html .= '</li>';
                        } else {
                            $html .= '</li>';
                        }
                    }
                    $html .= '</ul></li>';
                } else {
                    $html .= "<li><a href=\"" . "/" . $root->absolute . "\" title=\"" . $root->desc . "\">" . $root->name . "</a></li>";
                }
            }
            $html .= '</ul>';

            $tree = Tree::find($uri->id);
            $tree->category_menu = $html;
            $tree->save();
        }
    }

    public function recalculateTreeWithProd()
    {
        \DB::statement('CALL proc_tree_recalculate');
        $this->addMessage("Zavolán přepočet skupin (TREE)");
    }
}
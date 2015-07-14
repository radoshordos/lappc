<?php namespace Authority\Runner\Task\Recalculate;

use Authority\Eloquent\Tree;
use Authority\Eloquent\TreeDev;
use Authority\Eloquent\ViewTree;
use Authority\Runner\Task\iRun;
use Authority\Runner\Task\TaskMessage;
use Authority\Tools\ToolTree;

class TreeRecalculate extends TaskMessage implements iRun
{
    public function __construct($db)
    {
        parent::__construct($db);
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
        $arr_section = [16, 19, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 32];
        $uris = ViewTree::select(['tree_id', 'tree_group_id', 'tree_absolute'])->whereIn('tree_group_id', $arr_section)->orderBy('tree_id')->get();
        foreach ($uris as $uri) {
            $html = "";
            $euri = explode('/', $uri->tree_absolute);
            $html .= '<ul class="down sub0">';
            foreach ($arr_section as $val) {
                $root = ViewTree::select(['tree_id', 'tree_name', 'tree_desc', 'tree_group_id', 'tree_absolute'])->whereIn('tree_group_id', $arr_section)->where('tree_group_id', '=', $val)->where('tree_deep', '=', '0')->orderBy('tree_id')->first();
                if ($root->tree_group_id == $uri->tree_group_id) {
                    $html .= "<li><a " . ($uri->tree_id === $root->tree_id ? "class=\"actual\"" : NULL) . " href=\"" . "/" . $root->tree_absolute . "\" title=\"" . $root->tree_desc . "\">" . $root->tree_name . "</a><ul class=\"down sub1\">";
                    $ar1 = ViewTree::select(['tree_id', 'tree_name', 'tree_desc', 'tree_group_id', 'tree_relative', 'tree_absolute'])->whereIn('tree_group_id', $arr_section)->where('tree_group_id', '=', $val)->where('tree_deep', '=', '1')->orderBy('tree_id')->get()->toArray();
                    foreach ($ar1 as $value) {
                        $html .= "<li><a " . ($uri->tree_id === $value['tree_id'] ? "class=\"actual\"" : NULL) . " href=\"" . "/" . $value['tree_absolute'] . "\" title=\"" . $value['tree_desc'] . "\">" . $value['tree_name'] . "</a>";
                        if (isset($euri[0]) && $euri[0] == $value['tree_relative']) {
                            $ar2 = ViewTree::select(['tree_id', 'tree_name', 'tree_desc', 'tree_group_id', 'tree_relative', 'tree_absolute'])->whereIn('tree_group_id', $arr_section)->where('tree_parent_id', '=', $value['tree_id'])->where('tree_deep', '=', '2')->where('tree_group_id', '=', $val)->orderBy('tree_id')->get()->toArray();
                            if (!empty($ar2)) {
                                $html .= '<ul class="down sub2">';
                                foreach ($ar2 as $v2) {
                                    $html .= "<li><a " . ($uri->tree_id === $v2['tree_id'] ? "class=\"actual\"" : NULL) . " href=\"" . "/" . $v2['tree_absolute'] . "\" title=\"" . $v2['tree_desc'] . "\">" . $v2['tree_name'] . "</a>";
                                    if (isset($euri[2]) && $euri[1] == $v2['tree_relative']) {
                                        $ar3 = Tree::select(['tree_id', 'tree_name', 'tree_desc', 'tree_group_id', 'tree_relative', 'tree_absolute'])->whereIn('tree_group_id', $arr_section)->where('tree_parent_id', '=', $v2['tree_id'])->where('tree_deep', '=', '3')->where('tree_group_id', '=', $val)->orderBy('tree_id')->get()->toArray();
                                        if (!empty($ar3)) {
                                            $html .= '<ul class="down sub3">';
                                            foreach ($ar3 as $k3 => $v3) {
                                                $html .= "<li><a " . ($uri->tree_id === $v3['tree_id'] ? "class=\"actual\"" : NULL) . " href=\"" . "/" . $v3['tree_absolute'] . "\" title=\"" . $v3['tree_desc'] . "\">" . $v3['tree_name'] . '</a></li>';
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
                    $html .= "<li><a href=\"" . "/" . $root->tree_absolute . "\" title=\"" . $root->tree_desc . "\">" . $root->tree_name . "</a></li>";
                }
            }
            $html .= '</ul>';

            $tree = Tree::find($uri->tree_id);
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
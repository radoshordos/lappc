<?php namespace Authority\Runner\Task\Fix;

use Authority\Eloquent\Tree;
use Authority\Eloquent\ViewTree;
use Authority\Runner\Task\iRun;
use Authority\Runner\Task\TaskMessage;

class TreeDirectoryByPatternChild extends TaskMessage implements iRun
{
    public function __construct($db)
    {
        parent::__construct($db);
        $this->run();
    }

    public function run()
    {
        $this->leftMenu();
    }

    protected function leftMenu()
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
                    $ar1 = ViewTree::select(['tree_id', 'tree_absolute', 'tree_relative', 'tree_name', 'tree_desc', 'tree_deep'])->where('tree_group_id', '=', $val)->where('tree_deep', '=', '1')->orderBy('tree_id')->get()->toArray();
                    foreach ($ar1 as $value) {
                        $html .= "<li><a href=\"" . "/" . $value['tree_absolute'] . "\" title=\"" . $value['tree_desc'] . "\">" . $value['tree_name'] . "</a>";
                        if (isset($euri[0]) && $euri[0] == $value['tree_relative']) {
                            $ar2 = ViewTree::select(['tree_id', 'tree_absolute', 'tree_relative', 'tree_name', 'tree_desc', 'tree_deep'])->where('tree_parent_id', '=', $value['tree_id'])->where('tree_deep', '=', '2')->where('tree_group_id', '=', $val)->orderBy('tree_id')->get()->toArray();
                            if (!empty($ar2)) {
                                $html .= '<ul>';
                                foreach ($ar2 as $k => $v) {
                                    $html .= "<li><a href=\"" . "/" . $v['tree_absolute'] . "\" title=\"" . $v['tree_desc'] . "\">" . $v['tree_name'] . "</a>";
                                    if (isset($euri[1]) && $euri[1] == $v['tree_relative']) {
                                        $ar3 = ViewTree::select(['tree_id', 'tree_absolute', 'tree_relative', 'tree_name', 'tree_deep'])->where('tree_parent_id', '=', $v['tree_id'])->where('tree_deep', '=', '3')->where('tree_group_id', '=', $val)->orderBy('tree_id')->get()->toArray();
                                        if (!empty($ar3)) {
                                            $html .= '<ul>';
                                            foreach ($ar3 as $k3 => $v3) {
                                                $html .= "<li>" . $v3['tree_name'] . '</li>';
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
                    $html .= "<li><a href=\"" . "/" . $root->absolute . "\" title=\"" . $root->desc . "\">" .  $root->name . "</a></li>";
                }
            }
            $html .= '</ul>';

            $tree = Tree::find($uri->id);
            $tree->category_menu = $html;
            $tree->save();
        }
    }
}
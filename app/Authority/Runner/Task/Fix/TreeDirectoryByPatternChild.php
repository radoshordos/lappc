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
        $this->directoryFix();
        $this->leftMenu();
    }

    protected function leftMenu()
    {

        $uris = Tree::select(['id', 'group_id', 'absolute'])->whereIn('id', [21020000])->get();
        foreach ($uris as $uri) {
            $html = "";
            $euri = explode('/', $uri->absolute);
            foreach ([19, 21, 22, 23] as $val) {
                $root = Tree::select(['id', 'name', 'group_id', 'absolute'])->where('group_id', '=', $val)->where('deep', '=', '0')->first();
                if ($root->group_id == $uri->group_id) {
                    $html .= "<ul><li>" . $root->name . "<ul>";
                    $ar1 = ViewTree::select(['tree_id', 'tree_absolute', 'tree_relative', 'tree_name', 'tree_deep'])->where('tree_group_id', '=', $val)->where('tree_deep', '=', '1')->orderBy('tree_id')->get()->toArray();
                    foreach ($ar1 as $value) {
                        $html .= "<li>" . $value['tree_name'];
                        if ($euri[0] == $value['tree_relative']) {
                            $html .= '<ul>';
                            $ar2 = ViewTree::select(['tree_id', 'tree_absolute', 'tree_relative', 'tree_name', 'tree_deep'])->where('tree_parent_id', '=', $value['tree_id'])->where('tree_deep', '=', '2')->where('tree_group_id', '=', $val)->orderBy('tree_id')->get()->toArray();
                            foreach ($ar2 as $k => $v) {
                                $html .= "<li>" . $v['tree_name'] . "</li>";
                            }
                            $html .= '</ul></li>';
                        } else {
                            $html .= '</li>';
                        }
                    }
                    $html .= '</ul></li>';
                } else {
                    $html .= "<ul><li>" . $root->name . "</li></ul>";
                }
            }
            $html .= '</ul>';
        }

        $tree = Tree::find($uri->id);
        $tree->category_menu = $html;
        $tree->save();

    }


    public function directoryFix()
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

}
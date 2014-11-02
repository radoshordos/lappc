<?php
use Authority\Eloquent\Tree;
use Authority\Tools\SB;

class TreeVisualizationController extends \BaseController
{
    public function index()
    {
        return View::make('adm.summary.treevisualization.index', [
                'choice_group' => Input::get('group_id'),
                'group'        => SB::option("SELECT * FROM tree_group WHERE type='prodlist'", ['id' => '[->id] - ->name'], true),
                'the'          => Tree::where('group_id', '=', Input::get('group_id'))->get()
            ]
        );
    }
}
<?php

use Authority\Eloquent\TreeDev;

class TreeDevController extends \BaseController
{
    public function index()
    {
            return View::make('adm.summary.treedev.index',array(
                'treedev' => TreeDev::orderBy('tree_id', 'ASC')->orderBy('dev_id', 'ASC')->get()
            ));
    }
} 
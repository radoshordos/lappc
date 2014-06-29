<?php
use Authority\Eloquent\MixtureTree;
use Authority\Tools\SB;

class MixtureTreeController extends \BaseController
{
    protected $mixturetree;

    function __construct(MixtureTree $mixturetree)
    {
        $this->mixturetree = $mixturetree;
    }

    public function index()
    {
        $mixturetree = $this->mixturetree->orderBy('id')->get();
        return View::make('adm.pattern.mixturetree.index', array('mixturetree' => $mixturetree));
    }
}

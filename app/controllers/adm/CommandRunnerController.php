<?php

use \Authority\Eloquent\AdminRunner;
use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use Authority\Runner\RunnerProcessor;

class CommandRunnerController extends Controller
{
    protected $runner;

    function __construct(AdminRunner $runner)
    {
        $this->runner = $runner;
    }

    public function index()
       {
        $runner = $this->runner->all();


        return View::make('adm.admin.runner.index', compact('runner'));
    }

}
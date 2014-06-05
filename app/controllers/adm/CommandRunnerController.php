<?php

use Authority\Eloquent\AdminRunner;

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

    public function task($task)
    {
        $run = DB::table('runner')->where('alias', $task)->first();

        if (class_exists($run->class)) {
            $task = new $run->class($run);
        }
    }
}
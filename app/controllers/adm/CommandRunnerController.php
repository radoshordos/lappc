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

        $ao = new ArrayObject();

        if (Request::isMethod('post')) {
            if (Request::get('alias')) {
                foreach (Request::get('alias') as $row) {
                    var_dump($row);
                    $run = DB::table('runner')->where('alias', $row)->first();
                    var_dump($run);
                    die;
                    if (!empty($row) && class_exists($run->class)) {
                        $ao->append(new $run->class($run));
                    }
                }
            }

           // return View::make('adm.admin.runner.task', array('ao' => $ao, "run" => $run));
        }

        if (Request::isMethod('get')) {
            $run = DB::table('runner')->where('alias', $task)->first();
            if (!empty($run) && class_exists($run->class)) {
                $ao->append(new $run->class($run));
            }
           // return View::make('adm.admin.runner.task', array('ao' => $ao, "run" => $run));
        }
    }
}
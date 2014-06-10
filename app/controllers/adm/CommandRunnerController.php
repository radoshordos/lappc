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
        $runner = $this->runner->orderBy('id')->get();
        return View::make('adm.admin.runner.index', compact('runner'));
    }

    public function task($task)
    {
        $ao = new ArrayObject();

        if (Request::isMethod('post')) {
            if (Request::get('alias')) {

                foreach (array_keys(Request::get('alias')) as $key) {
                    $this->executeManualTask($ao, $key);
                }

                return View::make('adm.admin.runner.task', array('ao' => $ao));
            }
        }

        if (Request::isMethod('get')) {
            $this->executeManualTask($ao, $task);
            return View::make('adm.admin.runner.task', array('ao' => $ao));
        }
    }

    private function executeManualTask(ArrayObject $ao, $task)
    {
        $row = AdminRunner::find($task);

        if (!empty($row) && class_exists($row->class)) {


            $cl = new $row->class($row);
            $cl->stopTimer();

            $row->last_run_manual = strtotime('now');
            $row->save();

            $ao->append($cl);
        }
    }
}
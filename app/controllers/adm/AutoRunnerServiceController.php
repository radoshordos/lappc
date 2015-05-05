<?php

use \Authority\Eloquent\AdminRunner;

class AutoRunnerServiceController extends \BaseController
{
    public function index()
    {
        $ar = AdminRunner::selectRaw('*')
            ->whereRaw("last_run_automatic + autorun_minimim_range < " . strtotime("now"))
            ->where('autorun_first_run_day', '<', mktime(0, 0, 0, date("m"), date("d")))
            ->where('autorun', '=', 1)
            ->limit(3)
            ->get();

        \PHP_Timer::start();

        foreach ($ar as $row) {
            if (!empty($row) && class_exists($row->class)) {

                $runner = new $row->class($row);
                AdminRunner::where('class', '=', $row->class)->update(['last_run_automatic' => strtotime('now')]);
                echo "<b>" . get_class($runner) . "</b><br />";
                $runner->run();
                echo $runner->getMessages() . "<br />";


            }
        }

        echo "<br /><br />\n\n<b>RUN TIME :: " . \PHP_Timer::secondsToTimeString(\PHP_Timer::stop()) . "</b>";
    }
}
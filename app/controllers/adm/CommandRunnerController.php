<?php

use Authority\Eloquent\AdminRunner;
use Authority\Tools\Time\Timmer;

class CommandRunnerController extends \BaseController
{
	protected $runner;
	protected $timmer;

	function __construct(AdminRunner $runner)
	{
		$this->runner = $runner;
		$this->timmer = new Timmer();
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
				return View::make('adm.admin.runner.task', [
					'ao'    => $ao,
					'timer' => $this->timmer->stopTimer()
				]);
			}
		}

		if (Request::isMethod('get')) {
			$this->executeManualTask($ao, $task);
			return View::make('adm.admin.runner.task', [
				'ao'    => $ao,
				'timer' => $this->timmer->stopTimer()
			]);
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
<?php namespace Authority\Runner\Task\Events;

use Authority\Eloquent\Dev;
use Authority\Eloquent\MixtureDev;
use Authority\Eloquent\MixtureDevM2nDev;
use Authority\Runner\Task\iRun;
use Authority\Runner\Task\TaskMessage;

class MixtureOnlyOneDev extends TaskMessage implements iRun
{

	public function __construct($db)
	{
		parent::__construct($db);
		$this->run();
	}

	public function run()
	{
		$this->autoAllRecord();
		$this->autoSimpleRecord();
	}

	private function autoAllRecord()
	{
		$count_all = MixtureDev::where('purpose', '=', 'autoall')->count();
		if ($count_all == 0) {
			MixtureDev::create(['purpose' => 'autoall', 'name' => 'Všichni výrobci']);
		}

		$row_all = MixtureDev::select('id')->where('mixture_dev.purpose', '=', 'autoall')->first();

		$all = Dev::select('id')
			->whereNotIn('id', MixtureDevM2nDev::select('dev_id')
			->where('mixture_dev_id', '=', $row_all->id)->get()->toArray() + ['-1'])
			->where('id', '>', '1')->get();

		foreach ($all as $row) {
			MixtureDevM2nDev::create(['mixture_dev_id' => $row_all->id, 'dev_id' => $row->id]);
		}
	}

	private function autoSimpleRecord()
	{
		$results = \DB::select('SELECT id,name
                                FROM dev
                                WHERE id NOT IN (
                                    SELECT dev_id
                                    FROM mixture_dev_m2n_dev
                                    WHERE mixture_dev_id IN (
                                        SELECT id
                                        FROM mixture_dev
                                        WHERE mixture_dev.purpose = "autosimple"
                                    )
                                ) AND id > 1
        ');

		if ($results) {
			foreach ($results as $val) {
				\DB::transaction(function () use ($val) {

					$mdev = new MixtureDev;
					$mdev->purpose = 'autosimple';
					$mdev->name = 'ONLY ' . $val->name;
					$mdev->desc = 'AutoGenerate only dev: ' . $val->name;
					$mdev->save();

					$mdmd = new MixtureDevM2nDev;
					$mdmd->mixture_dev_id = $mdev->id;
					$mdmd->dev_id = $val->id;
					$mdmd->save();
				});
			}
		}
	}
}
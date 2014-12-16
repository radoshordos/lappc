<?php namespace Authority\Runner\Task\Events;

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

	public function run() {
		$this->autoAllRecord();
		$this->autoSimpleRecord();
	}

	private function autoAllRecord()
	{
		$count_all = MixtureDev::where('purpose', '=', 'autoall')->count();
		if ($count_all == 0) {
			MixtureDev::create(['purpose' => 'autoall', 'name' => 'Všichni výrobci']);
		}
/*
		$res = MixtureDevM2nDev::select('mixture_dev.dev_id')
			->rightJoin('mixture_dev','mixture_dev.id','=','mixture_dev_m2n_dev.mixture_dev_id')
			->whereNotIn('mixture_dev.purpose','=','autoall')
			->lists(['mixture_dev.dev_id']);

		var_dump($res);
*/
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
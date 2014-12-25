<?php namespace Authority\Runner\Task\Recalculate;

use Authority\Eloquent\Tree;
use Authority\Eloquent\TreeDev;
use Authority\Runner\Task\iRun;
use Authority\Runner\Task\TaskMessage;

class TreeRecalculate extends TaskMessage implements iRun
{

	public function __construct($db)
	{
		parent::__construct($db);
		$this->run();
	}

	public function run()
	{
		$this->recalculateTreeWithProd();
		$this->recalculateTreeWithoutProd();
	}

	public function recalculateTreeWithoutProd()
	{
		$tree = Tree::select('tree.id AS tree_id')
			->join('tree_group', 'tree.group_id', '=', 'tree_group.id')
			->where('tree_group.type', '!=', 'prodlist')
			->get();

		if (!empty($tree)) {
			foreach ($tree as $row) {
				$count = TreeDev::where('dev_id', '=', 1)->where('tree_id', '=', $row->tree_id)->count();
				if ($count === 0) {
					TreeDev::create([
						'tree_id'     => $row->tree_id,
						'dev_id'      => 1,
						'dir_visible' => 1
					]);
				}
			}
		}
	}

	public function recalculateTreeWithProd()
	{
		\DB::statement('CALL proc_tree_recalculate');
		$this->addMessage("Zavolán přepočet skupin (TREE)");
	}
}
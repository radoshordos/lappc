<?php namespace Authority\Web\Group;

use Authority\Eloquent\Dev;
use Authority\Eloquent\ViewTree;

class TreeMaster
{
	CONST URL_FIND = 'vyhledat-naradi';
	CONST URL_NEW = 'novinky-naradi';
	CONST URL_ACTION = 'akcni-ceny-naradi';

	private $dev_actual;
	private $view_tree_actual;
	private $url_part_one;
	private $url_part_second;

	public function setViewTreeActual($tree_absolute = NULL, $tree_id = NULL)
	{
		$this->url_part_one = $tree_absolute;
		if ($tree_absolute != NULL) {
			$tree = ViewTree::where('tree_absolute', '=', $tree_absolute)->first();
			if (!empty($tree)) {
				$this->view_tree_actual = $view_tree_actual = $tree->toArray();
			} else {
				throw new \Exception("NO TREE EXCEPTION");
			}
		} else if ($tree_id != NULL) {
			$tree = ViewTree::where('tree_id', '=', $tree_id)->first();
			if (!empty($tree)) {
				$this->view_tree_actual = $tree->toArray();
				$this->url_part_one = explode('/',$this->view_tree_actual['tree_absolute']);
			} else {
				throw new \Exception("NO TREE EXCEPTION");
			}
		}
	}

	public function setDevActual($dev_alias = NULL, $dev_id = NULL)
	{
		if ($dev_alias != NULL) {
			$dev = Dev::where('alias', '=', $dev_alias)->first();
			if (!empty($dev)) {
				$this->dev_actual = $dev->toArray();
			} else {
				$this->url_part_second = $dev_alias;
			}
		} else if ($dev_id != NULL) {
			$dev = Dev::where('id', '=', $dev_id)->first();
			if (!empty($dev)) {
				$this->dev_actual = $dev->toArray();
			}
		}
	}

	public function detectTree()
	{
		if (!isset($this->dev_actual['alias'])) {
			$url = implode('/', array_merge($this->url_part_one, [$this->url_part_second]));
		} else {
			$url = implode('/', $this->url_part_one);
		}

		switch ($url) {
			case self::URL_FIND . "/" :
				return new ProdFind($this->view_tree_actual, $this->dev_actual);
			case self::URL_ACTION . "/" :
				return new ProdAction($this->view_tree_actual, $this->dev_actual);
			case self::URL_NEW . "/" :
				return new ProdNew($this->view_tree_actual, $this->dev_actual);
			default:
				return new ProdList($this->view_tree_actual, $this->dev_actual);
		}
	}
}
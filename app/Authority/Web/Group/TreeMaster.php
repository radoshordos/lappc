<?php namespace Authority\Web\Group;

use Authority\Eloquent\Dev;

class TreeMaster
{
	private $url;
	private $data;
	private $sid;

	public function __construct(array $url, $dev)
	{
		$this->url = $url;
		$this->sid = \Session::getId();
		$this->data = $this->detectTree($url, $dev);
	}

	public function getTreeData()
	{
		return $this->data;
	}

	private function detectTree(array $url, $dev = NULL)
	{
		if ($dev != NULL) {
			$row = Dev::where('alias', '=', $dev)->first();
			$url = implode('/', array_merge($url, [$dev]));
			if (isset($row) && $row->count() > 0) {
				$dev = $row->toArray();
			}
		} else {
			$url = implode('/', array_merge($url));
		}

		switch ($url) {
			case 'vyhledat-zbozi' :
				return new ProdNew($url, $dev);
			case 'akcni-ceny-naradi' :
				return new ProdAction($url, $dev);
			case 'novinky-naradi' :
				return new ProdFind($url, $dev);
			default:
				return new ProdList($url, $dev);
		}
	}
}
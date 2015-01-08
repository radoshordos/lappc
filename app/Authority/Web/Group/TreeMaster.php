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
		$this->data = $this->detectTreeAndDev($url, $dev);
	}

	public function getData()
	{
		return $this->data;
	}

	private function detectTreeAndDev(array $url, $dev = NULL)
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
			case 'new' :
				//			return new ProdNew($url, $dev);
			case 'action' :
				//			return new ProdAction($url, $dev);
			case 'find' :
				//			return new ProdFind($url, $dev);
			default:
				return new ProdList($url, $dev);
		}
	}
}
<?php namespace Authority\Web\Group;

use Authority\Eloquent\Dev;

class TreeMaster
{
	private $dev_alias;
	private $url;
//	private $sid;

	public function __construct()
	{
	//	$this->sid = \Session::getId();
	}

	public function setUrl(array $url)
	{
		$this->url = $url;
	}

	public function setDevAlias($dev_alias)
	{
		$this->dev_alias = $dev_alias;
	}

	public function getDevAlias()
	{
		return $this->dev_alias;
	}

	public function detectTree()
	{
		$dev = NULL;
		if ($this->dev_alias != NULL) {
			$row = Dev::where('alias', '=', $this->dev_alias)->first();
			if ($row->count() == 0) {
				$url = implode('/', array_merge($this->url, [$this->dev_alias]));
			} else {
				$url = implode('/', array_merge($this->url));
				$dev = $row->toArray();
			}
		} else {
			$url = implode('/', array_merge($this->url));
		}

		switch ($url) {
			case 'vyhledat-naradi' :
				return new ProdFind($url,$dev);
			case 'akcni-ceny-naradi' :
				return new ProdAction($url,$dev);
			case 'novinky-naradi' :
				return new ProdNew($url,$dev);
			default:
				return new ProdList($url,$dev);
		}
	}
}
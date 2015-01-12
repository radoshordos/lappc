<?php namespace Authority\Web\Group;

use Authority\Eloquent\Dev;

class TreeMaster
{
	private $dev_alias;
	private $url;
	private $data;
	private $sid;
	private $dev_array;

	public function __construct()
	{
		$this->sid = \Session::getId();
	}

	public function setUrl(array $url)
	{
		$this->url = $url;
	}

	public function setDevArray($dev_array)
	{
		$this->dev_array = $dev_array;
	}

	public function getDevAlias()
	{
		return $this->dev_alias;
	}

	public function detectTree()
	{
		if ($this->tree != NULL) {
			$row = Dev::where('alias', '=', $this->tree)->first();

			$url = implode('/', array_merge($this->url, [$this->dev]));
			if (isset($row) && $row->count() > 0) {
				$this->setDevArray($row->toArray());
			}
		} else {
			$url = implode('/', array_merge($this->url));
		}

		switch ($url) {
			case 'vyhledat-naradi' :
				$dt = new ProdFind();
				break;
			case 'akcni-ceny-naradi' :
				$dt = new ProdAction();
				break;
			case 'novinky-naradi' :
				$dt = new ProdNew();
				break;
			default:
				$dt = new ProdList();
				break;
		}

		$dt->initViewTreeActual($url);
		return $dt;
	}
}
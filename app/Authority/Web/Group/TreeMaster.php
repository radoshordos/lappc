<?php namespace Authority\Web\Group;

use Authority\Eloquent\Dev;

class TreeMaster
{
	CONST URL_FIND = 'vyhledat-naradi';
	CONST URL_NEW = 'novinky-naradi';
	CONST URL_ACTION = 'akcni-ceny-naradi';

	private $dev_alias;
	private $url;

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
		$dev_actual = NULL;
		if ($this->dev_alias != NULL) {
			$dev_actual = Dev::where('alias', '=', $this->dev_alias)->first();
			if (empty($dev_actual)) {
				$url = implode('/', array_merge($this->url, [$this->dev_alias]));
			} else {
				$dev_actual = $dev_actual->toArray();
				$url = implode('/', array_merge($this->url));
			}
		} else {
			$url = implode('/', array_merge($this->url));
		}

		switch ($url) {
			case self::URL_FIND :
				return new ProdFind($url, $dev_actual);
			case self::URL_ACTION :
				return new ProdAction($url, $dev_actual);
			case self::URL_NEW :
				return new ProdNew($url, $dev_actual);
			default:
				return new ProdList($url, $dev_actual);
		}
	}
}
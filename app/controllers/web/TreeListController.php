<?php

use Authority\Web\Group\ProdAction;
use Authority\Web\Group\ProdFind;
use Authority\Web\Group\ProdList;
use Authority\Web\Group\ProdNew;


class TreeListController extends EshopController
{


	public function __construct()
	{

	}

	public function initTreeGroup($url)
	{
		switch ($url) {
			case 'new' :
				return new ProdNew();
			case 'action' :
				return new ProdAction();
			case 'find' :
				return new ProdFind();
			default:
				return new ProdList();
		}
	}
}
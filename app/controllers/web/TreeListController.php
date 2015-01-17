<?php

use Authority\Web\Group\iProdList;
use Authority\Web\Group\ProdAction;
use Authority\Web\Group\ProdNew;
use Authority\Web\Group\ProdFind;
use Authority\Web\Group\ProdList;

class TreeListController extends EshopController
{

	public function ajajtree()
	{

		var_dump(Input::all());
	}

	public function getTreeGroup()
	{
		switch (Input::get('group')) {
			case 'prodaction' :
				return new ProdAction();
			case 'prodnew' :
				return new ProdNew();
			case 'prodfind' :
				return new ProdFind();
			default:
				return new ProdList();
		}
	}
}
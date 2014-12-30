<?php

class Url01Controller extends EshopController
{

	public function show($url01)
	{
		$text = $this->isText($url01);
		return (!is_null($text)) ? $text : $this->isTree([$url01]);
	}

}
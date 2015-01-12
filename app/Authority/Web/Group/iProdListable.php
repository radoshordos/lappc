<?php namespace Authority\Web\Group;

interface iProdListable
{
	CONST PAGINATE_PAGE = 24;

	public function initViewTreeActual($url);

	public function getViewTreeActual();

	public function getDevArray();

	public function getDevList($dev = NULL);

	public function getViewProdPagination($dev = NULL);
}
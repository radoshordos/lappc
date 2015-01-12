<?php namespace Authority\Web\Group;

interface iProdList
{
	CONST PAGINATE_PAGE = 24;

	public function __construct();

	public function setDevId($dev);

	public function getViewTreeActual();

	public function getDevList($dev = NULL);

	public function getViewProdPagination($dev = NULL);

}
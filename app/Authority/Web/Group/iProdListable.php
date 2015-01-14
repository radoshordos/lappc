<?php namespace Authority\Web\Group;

interface iProdListable
{
	CONST PAGINATE_PAGE = 24;

	public function __construct($url = NULL, $dev_actual = NULL);

	public function getViewTreeActual();

	public function getDevArray();

	public function getDevList();

	public function getViewProdPagination();
}
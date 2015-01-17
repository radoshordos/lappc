<?php namespace Authority\Web\Group;

interface iProdListable
{
	CONST PAGINATE_PAGE = 24;

	public function __construct($view_tree_actual = NULL, $dev_actual = NULL);

	public function getViewTreeActual();

	public function getDevActual();

	public function getDevList();

	public function getViewProdPagination();
}
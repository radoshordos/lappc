<?php namespace Authority\Tools;

class SF
{
	static function friendlyAlias($string)
	{
		$url = preg_replace('~[^\\pL0-9_]+~u', '-', $string);
		$url = trim($url, "-");
		$url = iconv("utf-8", "us-ascii//TRANSLIT", $url);
		$url = strtolower($url);
		return preg_replace('~[^-a-z0-9_]+~', '', $url);
	}

	static function friendlySearch($source)
	{
		$chars = ['"' => '', '+' => '', ' ' => '', '(' => '', ')' => '', '#' => '', ':' => '', ',' => '', '\'' => '', '.' => '', '\'' => '', '-' => ''];
		$url = str_replace(array_keys($chars), array_values($chars), trim(strtolower($source)));
		$url = preg_replace('~[^\\pL0-9_]+~u', '-', $url);
		$url = trim($url, "-");
		$url = iconv("utf-8", "us-ascii//TRANSLIT", $url);
		$url = strtolower($url);
		return preg_replace('~[^-a-z0-9_]+~', '', $url);
	}
}
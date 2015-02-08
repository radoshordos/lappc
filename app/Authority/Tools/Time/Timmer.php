<?php namespace Authority\Tools\Time;

class Timmer
{
	public static $startime;
	private $microtime;

	public function __construct()
	{
		if (empty(self::$startime)) {
			self::$startime = microtime(true);
		}
	}

	public function stopTimer()
	{
		$this->microtime = microtime(true);
		return $this;
	}

	public function getTime()
	{
		return round($this->microtime - self::$startime, 4) . "s";
	}
}
<?php namespace Authority\Runner\Task;

class TaskMessage
{
	protected $start;
	protected $message;
	protected $db;
	protected $microtime;

	public function __construct($db)
	{
		$this->db = $db;
		$this->start = microtime(true);
		$this->comment = [];
	}

	public function addMessage($comment)
	{
		$this->message[] = $comment;
	}

	public function getMessages()
	{
		if (count($this->message) > 0) {
			return implode("<br />", $this->message);
		}
	}

	public function stopTimer()
	{
		$this->microtime = microtime(true);
	}

	public function getTimeRunTask()
	{
		return round($this->microtime - $this->start, 5) . "s";
	}

	public function getClassName()
	{
		return $this->db->class;
	}
}
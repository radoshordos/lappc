<?php namespace Authority\Runner\Task\Store;

class Downloader
{
	protected $dir;
	protected $file;
	protected $source;

	function __construct($dir, $file, $source)
	{
		$this->dir = $dir;
		$this->file = $file;
		$this->source = $source;
	}

	function runDownload($file_get_context = true)
	{
		if ($file_get_context == true) {
			file_put_contents($this->dir . $this->file, file_get_contents($this->source));
		} else {
			file_put_contents($this->dir . $this->file, $this->source);
		}
	}

	function unzipDownload()
	{
		$zip = new \ZipArchive();
		$result = $zip->open($this->dir . $this->file);
		if ($result === true) {
			$zip->extractTo($this->dir);
			$zip->close();
			return true;
		}
		return false;
	}
}
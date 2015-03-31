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

    function runDownload($file_get_context = TRUE)
    {
        if ($file_get_context == TRUE) {
            $context = stream_context_create(['http' => ['header' => "User-Agent: Guru-Naradi-Downloader/1.0\r\n"]]);
            file_put_contents($this->dir . $this->file, trim(file_get_contents($this->source, FALSE, $context)));
        } else {
            file_put_contents($this->dir . $this->file, trim($this->source));
        }
    }

    function unzipDownload()
    {
        $zip = new \ZipArchive();
        $result = $zip->open($this->dir . $this->file);
        if ($result === TRUE) {
            $zip->extractTo($this->dir);
            $zip->close();
            return TRUE;
        }
        return FALSE;
    }
}
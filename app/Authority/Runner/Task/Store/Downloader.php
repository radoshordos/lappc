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
        $opts = ['http' => ['method'  => "GET",
                            'timeout' => 90,
                            'header'  => "User-Agent: Guru-Naradi-Cz-Downloader/1.0\r\n"]
        ];

        if ($file_get_context == TRUE) {
            $context = stream_context_create($opts);
            file_put_contents($this->dir . $this->file, file_get_contents(trim($this->source), FALSE, $context));
        } else {
            file_get_contents($this->dir . $this->file, $this->source);
        }
    }

    public function saveToFile()
    {
        file_put_contents($this->dir . $this->file, $this->source);
    }

    function unzipDownload()
    {
        $zip = new \ZipArchive();
        if ($zip->open($this->dir . $this->file) === TRUE) {
            $zip->extractTo($this->dir);
            $zip->close();
            return TRUE;
        }
        return FALSE;
    }
}
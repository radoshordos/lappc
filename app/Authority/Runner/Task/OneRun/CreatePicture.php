<?php namespace Authority\Runner\Task\OneRun;

use Authority\Runner\Task\iRun;
use Authority\Runner\Task\TaskMessage;
use Authority\Tools\Image\ProdImageRegenerator;

class CreatePicture extends TaskMessage implements iRun
{
    public function __construct($db)
    {
        parent::__construct($db);
        $this->run();
    }

    public function run()
    {
        $di = new \RecursiveDirectoryIterator('C:\work\FOTO\akumulatorove-naradi\aku-uhlove-vrtacky');
        foreach (new \RecursiveIteratorIterator($di) as $pathName => $file) {
            if (strpos($pathName, "(") == true) {
                $pir = new ProdImageRegenerator($pathName, $file->getPath(), $file->getFilename());
                $pir->createProdPictures(228, 228);
            }
        }
        $this->addMessage("Dokončeno");
    }
}
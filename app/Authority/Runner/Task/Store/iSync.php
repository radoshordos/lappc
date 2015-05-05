<?php namespace Authority\Runner\Task\Store;

interface iSync
{
    public function run();

    public function getFile();

    public function remotelyPrepareSynchronize();

    public function runSynchronizeData();

    public function getSyncUploadDirectory();

    public function getFeedDirName();
}
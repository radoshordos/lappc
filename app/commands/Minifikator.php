<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use Assetic\Asset\AssetCollection;
use Assetic\Asset\FileAsset;
use Assetic\Asset\GlobAsset;
use Assetic\Filter\JSMinFilter;
use Assetic\Filter\GoogleClosure\CompilerApiFilter;
use Assetic\Filter\CssImportFilter;
use Assetic\Filter\MinifyCssCompressorFilter;

class Minifikator extends Command
{
    protected $name = 'command:minifikator';
    protected $description = 'Run minification';

    public function __construct()
    {
        parent::__construct();
    }

    public function fire()
    {
        $this->adminMinJs();
        $this->adminMinCss();
        $this->webMinJs();
        $this->webMinCss();
    }

    protected function getArguments()
    {
        return [
            ['example', InputArgument::OPTIONAL, 'An example argument.'],
        ];
    }

    protected function getOptions()
    {
        return [
            ['example', NULL, InputOption::VALUE_OPTIONAL, 'An example option.', NULL],
        ];
    }

    public function adminMinJs()
    {
        $js = new AssetCollection([
            new FileAsset('./public/web/components/restfulizer/restfulizer.js'),
            new GlobAsset('./public/web/my/admin/js/*')
        ], [
            new CompilerApiFilter()
        ]);

        file_put_contents('./public/web/my/public/style/js/guru-admin.compress-cache.js', $js->dump());

        $js = new AssetCollection([
            new FileAsset('./public/web/components/jquery/jquery.min.js'),
            new FileAsset('./public/web/components/select2/dist/js/select2.min.js'),
            new FileAsset('./public/web/components/bootstrap/js/bootstrap.min.js'),
            new FileAsset('./public/web/my/public/style/js/guru-admin.compress-cache.js'),
        ], [
            new JSMinFilter()
        ]);

        file_put_contents('./public/web/my/public/style/js/guru-admin.min.js', $js->dump());
    }

    public function adminMinCss()
    {
        $css = new AssetCollection([
            new FileAsset('./public/web/components/font-awesome/css/font-awesome.min.css'),
            new FileAsset('./public/web/components/select2/dist/css/select2.min.css'),
            new FileAsset('./public/web/components/bootstrap/css/bootstrap.min.css'),
            new FileAsset('./public/web/components/bootstrap/css/bootstrap-theme.min.css'),
        ], [
            new CssImportFilter()
        ]);

        file_put_contents('./public/web/my/public/style/css/guru-admin.min.css', $css->dump());
    }

    public function webMinJs()
    {
        $js = new AssetCollection([
            new FileAsset('./public/web/components/restfulizer/restfulizer.js'),
            new FileAsset('./public/web/components/modernizr/modernizr.js'),
        ], [
            new CompilerApiFilter()
        ]);

        file_put_contents('./public/web/my/public/style/js/guru.before.compress.js', $js->dump());

        $js = new AssetCollection([
            new GlobAsset('./public/web/my/web/js/*')
        ], [
            new CompilerApiFilter()
        ]);

        file_put_contents('./public/web/my/public/style/css/guru.after.compress.js', $js->dump());

        $js = new AssetCollection([
            new FileAsset('./public/web/my/public/style/js/guru.before.compress.js'),
            new FileAsset('./public/web/components/jquery/jquery.min.js'),
            new FileAsset('./public/web/components/jquery-ui/jquery-ui.min.js'),
            new FileAsset('./public/web/components/foundation/js/foundation.min.js'),
            new FileAsset('./public/web/my/web/guru.after.compress.js.js'),
        ], [
            new JSMinFilter()
        ]);

        file_put_contents('./public/web/my/public/style/css/guru.min.js', $js->dump());
    }


    public function webMinCss()
    {
        $css = new AssetCollection([
            new GlobAsset('./public/web/my/web/css/*')
        ], [
            new CompilerApiFilter()
        ]);

        file_put_contents('./public/web/my/public/style/css/guru.after.compress.css', $css->dump());

        $css = new AssetCollection([
            new FileAsset('./public/web/components/foundation/css/normalize.css'),
            new FileAsset('./public/web/components/foundation/css/foundation.min.css'),
            new FileAsset('./public/web/components/jquery-ui/jquery-ui.min.css'),
            new FileAsset('./public/web/my/public/style/css/guru.after.compress.css'),
        ], [
            new CssImportFilter()
        ]);

        file_put_contents('./public/web/my/public/style/css/guru.min.css', $css->dump());
    }
}
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
    CONST CACHE = './public/web/my/cache/';
    CONST COMPONENTS = './public/web/components/';
    CONST VISIBLE = './public/web/my/';

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
            new FileAsset(self::COMPONENTS . '/restfulizer/restfulizer.js'),
            new GlobAsset('./public/web/my/admin/js/*')
        ], [
            new CompilerApiFilter()
        ]);

        file_put_contents(self::CACHE . 'admin.after.compress.js', $js->dump());

        $js = new AssetCollection([
            new FileAsset(self::COMPONENTS . 'jquery/jquery.min.js'),
            new FileAsset(self::COMPONENTS . 'select2/dist/js/select2.min.js'),
            new FileAsset(self::COMPONENTS . 'bootstrap/js/bootstrap.min.js'),
            new FileAsset(self::CACHE . 'admin.after.compress.js'),
        ], [
            new JSMinFilter()
        ]);

        file_put_contents(self::VISIBLE . 'admin.min.js', $js->dump());
    }

    public function adminMinCss()
    {
        $css = new AssetCollection([
            new GlobAsset('./public/web/admin/web/css/*')
        ], [
            new MinifyCssCompressorFilter()
        ]);

        file_put_contents(self::CACHE . 'admin.after.compress.css', $css->dump());

        $css = new AssetCollection([
            new FileAsset(self::COMPONENTS . 'font-awesome/css/font-awesome.min.css'),
            new FileAsset(self::COMPONENTS . 'select2/dist/css/select2.min.css'),
            new FileAsset(self::COMPONENTS . 'bootstrap/css/bootstrap.min.css'),
            new FileAsset(self::COMPONENTS . 'bootstrap/css/bootstrap-theme.min.css'),
            new FileAsset(self::CACHE . 'admin.after.compress.css'),
        ], [
            new CssImportFilter()
        ]);

        file_put_contents(self::VISIBLE . 'admin.min.css', $css->dump());
    }

    public function webMinJs()
    {
        $js = new AssetCollection([
            new FileAsset(self::COMPONENTS . 'restfulizer/restfulizer.js'),
            new FileAsset(self::COMPONENTS . 'modernizr/modernizr.js'),
        ], [
            new CompilerApiFilter()
        ]);

        file_put_contents(self::CACHE . 'guru.before.compress.js', $js->dump());

        $js = new AssetCollection([
            new GlobAsset('./public/web/my/web/js/*')
        ], [
            new CompilerApiFilter()
        ]);

        file_put_contents(self::CACHE . 'guru.after.compress.js', $js->dump());

        $js = new AssetCollection([
            new FileAsset(self::CACHE . 'guru.before.compress.js'),
            new FileAsset(self::COMPONENTS . 'jquery/jquery.min.js'),
            new FileAsset(self::COMPONENTS . 'jquery-ui/jquery-ui.min.js'),
            new FileAsset(self::COMPONENTS . 'foundation/js/foundation.min.js'),
            new FileAsset(self::COMPONENTS . 'colorbox/js/colorbox.min.js'),
            new FileAsset(self::CACHE . 'guru.after.compress.js'),
        ], [
            new JSMinFilter()
        ]);

        file_put_contents(self::VISIBLE . 'guru.min.js', $js->dump());
    }

    public function webMinCss()
    {
        $css = new AssetCollection([
            new FileAsset(self::COMPONENTS . 'foundation/css/normalize.css'),
//            new GlobAsset('./public/web/my/web/css/*')
        ], [
            new MinifyCssCompressorFilter()
        ]);

        file_put_contents(self::CACHE . 'guru.after.compress.css', $css->dump());

        $css = new AssetCollection([
            new FileAsset(self::COMPONENTS . 'foundation/css/foundation.min.css'),
            new FileAsset(self::COMPONENTS . 'jquery-ui/jquery-ui.min.css'),
            new FileAsset(self::COMPONENTS . 'font-awesome/css/font-awesome.min.css'),
            new FileAsset(self::COMPONENTS . 'colorbox/css/colorbox.min.css'),
            new FileAsset(self::CACHE . 'guru.after.compress.css'),
        ], [
            new CssImportFilter()
        ]);

        file_put_contents(self::VISIBLE . 'guru.min.css', $css->dump());
    }
}
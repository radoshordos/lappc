<?php
/**
 * Configure laravel-assetic in this file.
 * File modified by AARYAN ADITYA
 * @package slushie/laravel-assetic
 */

return [
    'groups'  => [
        'singlejs-main'  => [
            'filters' => [
                'js_min'
            ],
            'assets'  => [
                'web/components/jquery/jquery.min.js',
                'web/components/modernizr/modernizr.js',
                'web/components/foundation/js/foundation.min.js',
                'web/components/jquery-ui/jquery-ui.min.js'
            ],
            'output'  => 'web/guru.js'
        ],
        'singlecss-main' => [
            'filters' => [
                'css_import',
                'css_rewrite'
            ],
            'assets'  => [
                'web/components/foundation/css/normalize.css',
                'web/components/foundation/css/foundation.min.css',
                'web/my/app.css'
            ],
            'output'  => 'web/guru.css'
        ],
    ],
    'filters' => [
        'yui_js'       => function () {
            return new Assetic\Filter\Yui\JsCompressorFilter('yui-compressor.jar');
        },
        'js_min'       => 'Assetic\Filter\JSMinFilter',
        'js_min_plus'  => 'Assetic\Filter\JSMinPlusFilter',
        'css_import'   => 'Assetic\Filter\CssImportFilter',
        'css_rewrite'  => 'Assetic\Filter\CssRewriteFilter',
        'emed_css'     => 'Assetic\Filter\PhpCssEmbedFilter',
        'coffe_script' => 'Assetic\Filter\CoffeeScriptFilter',
        'less_php'     => 'Assetic\Filter\LessphpFilter',
    ]
];
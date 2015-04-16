<?php

return [
    'groups'  => [
        'admin-guru-js'  => [
            'filters' => [
                'js_min'
            ],
            'assets'  => [
                'admin/components/jquery/jquery.min.js',
                'admin/components/select2/dist/js/select2.js',
                'admin/components/bootstrap/js/bootstrap.min.js',
                'admin/components/restfulizer/restfulizer.js',
                'admin/mystyle/style.js'
            ],
            'output'  => 'admin/admin.min.js'
        ],
        'admin-guru-css' => [
            'filters' => [
                'css_import',
                'css_rewrite'
            ],
            'assets'  => [
                "admin/components/bootstrap/css/bootstrap.min.css",
                "admin/components/bootstrap/css/bootstrap-theme.min.css",
                "admin/components/select2/dist/css/select2.css",
                "admin/components/font-awesome/css/font-awesome.min.css",
                "admin/mystyle/style.css"
            ],
            'output'  => 'admin/admin.min.css'
        ],
        'web-guru-js'    => [
            'filters' => [
                'js_min'
            ],
            'assets'  => [
                'web/components/jquery/jquery.min.js',
                'web/components/modernizr/modernizr.js',
                'web/components/foundation/js/foundation.min.js',
                'web/components/jquery-ui/jquery-ui.min.js',
            ],
            'output'  => 'web/guru.js'
        ],
        'web-guru-css'   => [
            'filters' => [
                'css_import',
                'emed_css',
                'css_min'
            ],
            'assets'  => [
                'web/components/foundation/css/normalize.css',
                'web/components/foundation/css/foundation.min.css',
                'web/components/jquery-ui/jquery-ui.min.css'
            ],
            'output'  => 'web/guru.css'
        ],
    ],
    'filters' => [
        'yui_js'           => function () {
            return new Assetic\Filter\Yui\JsCompressorFilter('yui-compressor.jar');
        },
        'js_min'           => 'Assetic\Filter\JSMinFilter',
        'js_min_plus'      => 'Assetic\Filter\JSMinPlusFilter',
        'css_import'       => 'Assetic\Filter\CssImportFilter',
        'css_min'          => 'Assetic\Filter\CssMinFilter',
        'css_rewrite'      => 'Assetic\Filter\CssRewriteFilter',
        'emed_css'         => 'Assetic\Filter\PhpCssEmbedFilter',
    ]
];
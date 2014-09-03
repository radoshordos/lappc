<?php

Route::get('/', array('as' => 'home', 'uses' => 'HomeController@showWelcome'));

Route::get('feeds/{file?}', array('uses' => 'FeedController@show'));

Route::group(array('prefix' => 'feed/{file}'), function () {
    Route::get('feed', array('as' => 'feed.index', 'uses' => 'FeedServiceController@index'));
});

Route::group(array('prefix' => 'adm'), function () {

    Route::group(array('prefix' => 'ppc', 'before' => 'Sentry|inGroup:Admins'), function () {

        Route::any('import', array('as' => 'adm.ppc.import.show', 'uses' => 'PpcImportController@show'));
        Route::any('config', array('as' => 'adm.ppc.config.show', 'uses' => 'PpcConfigController@show'));

        Route::resource('db', 'PpcDbController');
        Route::resource('rules', 'PpcRulesController');
        Route::resource('keywords', 'PpcKeywordsController');
    });

    Route::group(array('prefix' => 'admin', 'before' => 'Sentry|inGroup:Admins'), function () {
        Route::resource('feed', 'FeedServiceController');
        Route::get('phpinfo', array('as' => 'adm.admin.phpinfo.index', 'uses' => 'PhpinfoController@index'));
        Route::match(array('GET', 'POST'), 'runner/{task}', array('as' => 'adm.admin.runner.task', 'uses' => 'CommandRunnerController@task'));
        Route::resource('runner', 'CommandRunnerController');
    });

    Route::group(array('prefix' => 'product', 'before' => 'Sentry|inGroup:Simple'), function () {
        Route::resource('prod', 'ProdController');
        Route::match(array('GET', 'POST'), 'prod/{prod}/edit', array('as' => 'adm.product.prod.edit', 'uses' => 'ProdController@edit'));
        Route::resource('akce', 'AkceController');
        Route::resource('akcetemplate', 'AkceTemplateController');
        Route::resource('akceminitext', 'AkceMinitextController');
        Route::resource('akceavailability', 'AkceAvailabilityController');
    });

    Route::group(array('prefix' => 'pattern', 'before' => 'Sentry|inGroup:Power'), function () {
        Route::resource('dev', 'DevController');
        Route::resource('mixturedev', 'MixtureDevController');
        Route::resource('mixturedevm2ndev', 'MixtureDevM2nDevController');
        Route::resource('tree', 'TreeController');
        Route::resource('mixturetree', 'MixtureTreeController');
    });

    Route::group(array('prefix' => 'summary', 'before' => 'Sentry|inGroup:Simple'), function () {
        Route::get('treegrouptop', array('as' => 'adm.summary.treegrouptop.index', 'uses' => 'TreeGroupTopController@index'));
        Route::get('treedev', array('as' => 'adm.summary.treedev.index', 'uses' => 'TreeDevController@index'));
        Route::any('sale', array('as' => 'adm.summary.sale.index', 'uses' => 'SaleController@index'));
    });

    Route::group(array('prefix' => 'sync', 'before' => 'Sentry|inGroup:Power'), function () {
        Route::resource('template', 'SyncCsvTemplateController');
        Route::resource('templatem2ncolumn', 'SyncTemplateM2nColumnController');
        Route::any('csvimport', array('as' => 'adm.sync.csvimport.index', 'uses' => 'SyncCsvImportController@index'));
        Route::any('record', array('as' => 'adm.sync.record.index', 'uses' => 'SyncRecordController@index'));
        Route::any('db', array('as' => 'adm.sync.db.index', 'uses' => 'SyncDbController@index'));
    });

    Route::group(array('prefix' => 'tools', 'before' => 'Sentry|inGroup:Simple'), function () {
        Route::any('calculator', array('as' => 'adm.tools.calculator.index', 'uses' => 'ToolCalculatorController@index'));
        Route::any('comparator', array('as' => 'adm.tools.comparator.index', 'uses' => 'ToolComparatorController@index'));
        Route::any('csvoptimal', array('as' => 'adm.tools.csvoptimal.index', 'uses' => 'ToolCsvOptimalController@index'));
    });

    // Session Routes
    Route::get('login', array('as' => 'adm.login', 'uses' => 'SessionController@create'));
    Route::get('logout', array('as' => 'adm.logout', 'uses' => 'SessionController@destroy'));
    Route::resource('sessions', 'SessionController', array('only' => array('create', 'store', 'destroy')));

    // User Routes
    Route::get('register', 'UserController@create');
    Route::get('users/{id}/activate/{code}', 'UserController@activate')->where('id', '[0-9]+');
    Route::get('resend', array('as' => 'resendActivationForm', function () {
        return View::make('adm.users.resend');
    }));
    Route::post('resend', 'UserController@resend');
    Route::get('forgot', array('as' => 'forgotPasswordForm', function () {
        return View::make('adm.users.forgot');
    }));
    Route::post('forgot', 'UserController@forgot');
    Route::post('users/{id}/change', 'UserController@change');

    Route::get('users/{id}/reset/{code}', 'UserController@reset')->where('id', '[0-9]+');
    Route::get('users/{id}/suspend', array('as' => 'suspendUserForm', function ($id) {
        return View::make('adm.users.suspend')->with('id', $id);
    }));
    Route::post('users/{id}/suspend', 'UserController@suspend')->where('id', '[0-9]+');
    Route::get('users/{id}/unsuspend', 'UserController@unsuspend')->where('id', '[0-9]+');
    Route::get('users/{id}/ban', 'UserController@ban')->where('id', '[0-9]+');
    Route::get('users/{id}/unban', 'UserController@unban')->where('id', '[0-9]+');
    Route::resource('users', 'UserController');

    // Group Routes
    Route::resource('groups', 'GroupController');
});

Route::get('adm', array('as' => 'adm.home', function () {
    return View::make('adm.home');
}));
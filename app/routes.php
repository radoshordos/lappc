<?php

Route::get('/', ['as' => 'home', 'uses' => 'HomeController@showWelcome']);

Route::get('feeds/{file?}', ['uses' => 'FeedController@show']);

Route::group(['prefix' => 'feed/{file}'], function () {
    Route::get('feed', ['as' => 'feed.index', 'uses' => 'FeedServiceController@index']);
});

Route::group(['prefix' => 'adm'], function () {

    Route::group(['prefix' => 'ppc', 'before' => 'Sentry|inGroup:Admins'], function () {

        Route::any('import', ['as' => 'adm.ppc.import.show', 'uses' => 'PpcImportController@show']);
        Route::any('config', ['as' => 'adm.ppc.config.show', 'uses' => 'PpcConfigController@show']);

        Route::resource('db', 'PpcDbController');
        Route::resource('rules', 'PpcRulesController');
        Route::resource('keywords', 'PpcKeywordsController');
    });

    Route::group(['prefix' => 'admin', 'before' => 'Sentry|inGroup:Admins'], function () {
        Route::resource('feed', 'FeedServiceController');
        Route::get('phpinfo', ['as' => 'adm.admin.phpinfo.index', 'uses' => 'PhpinfoController@index']);
        Route::match(['GET', 'POST'], 'runner/{task}', ['as' => 'adm.admin.runner.task', 'uses' => 'CommandRunnerController@task']);
        Route::resource('runner', 'CommandRunnerController');
    });

    Route::group(['prefix' => 'product', 'before' => 'Sentry|inGroup:Simple'], function () {
        Route::resource('prod', 'ProdController');
        Route::match(['GET', 'POST'], 'prod/{tree}/{prod}/edit', ['as' => 'adm.product.prod.edit', 'uses' => 'ProdController@edit'])->where(['tree' => '[0-9]+', 'prod' => '[0-9]+']);
        Route::any('prod/{tree}/{prod}', ['as' => 'adm.product.prod.update', 'uses' => 'ProdController@update'])->where(['tree' => '[0-9]+', 'prod' => '[0-9]+']);
        Route::resource('akce', 'AkceController');
        Route::any('akcehuge', ['as' => 'adm.product.akcehuge.index', 'uses' => 'AkceHugeController@index']);
        Route::resource('akcetemplate', 'AkceTemplateController');
        Route::resource('akceminitext', 'AkceMinitextController');
        Route::resource('akceavailability', 'AkceAvailabilityController');
    });

    Route::group(['prefix' => 'pattern', 'before' => 'Sentry|inGroup:Power'], function () {
        Route::resource('dev', 'DevController');
        Route::resource('mixturedev', 'MixtureDevController');
        Route::resource('mixturedevm2ndev', 'MixtureDevM2nDevController');
        Route::resource('tree', 'TreeController');
        Route::resource('mixturetree', 'MixtureTreeController');
        Route::resource('prodwarranty', 'ProdWarrantyController');
        Route::resource('proddifference', 'ProdDifferenceController');
    });

    Route::group(['prefix' => 'summary', 'before' => 'Sentry|inGroup:Simple'], function () {
        Route::get('treegroup', ['as' => 'adm.summary.treegroup.index', 'uses' => 'TreeGroupController@index']);
        Route::get('treedev', ['as' => 'adm.summary.treedev.index', 'uses' => 'TreeDevController@index']);
        Route::any('sale', ['as' => 'adm.summary.sale.index', 'uses' => 'SummarySaleController@index']);
        Route::any('availability', ['as' => 'adm.summary.availability.index', 'uses' => 'SummaryAvailabilityController@index']);
    });

    Route::group(['prefix' => 'sync', 'before' => 'Sentry|inGroup:Power'], function () {
        Route::resource('template', 'SyncCsvTemplateController');
        Route::resource('templatem2ncolumn', 'SyncTemplateM2nColumnController');
        Route::any('csvimport', ['as' => 'adm.sync.csvimport.index', 'uses' => 'SyncCsvImportController@index']);
        Route::any('record', ['as' => 'adm.sync.record.index', 'uses' => 'SyncRecordController@index']);
        Route::any('db', ['as' => 'adm.sync.db.index', 'uses' => 'SyncDbController@index']);
    });

    Route::group(['prefix' => 'tools', 'before' => 'Sentry|inGroup:Simple'], function () {
        Route::any('calculator', ['as' => 'adm.tools.calculator.index', 'uses' => 'ToolCalculatorController@index']);
        Route::any('comparator', ['as' => 'adm.tools.comparator.index', 'uses' => 'ToolComparatorController@index']);
        Route::any('csvoptimal', ['as' => 'adm.tools.csvoptimal.index', 'uses' => 'ToolCsvOptimalController@index']);
        Route::resource('grab', 'GrabController');
        Route::any('grabsimulator', ['as' => 'adm.tools.grabsimulator.index', 'uses' => 'GrabSimulatorController@index']);
    });

    Route::group(['prefix' => 'stats', 'before' => 'Sentry|inGroup:Simple'], function () {
        Route::any('find', ['as' => 'adm.stats.find.index', 'uses' => 'StatsFindController@index']);
    });

    Route::group(['prefix' => 'buy', 'before' => 'Sentry|inGroup:Simple'], function () {
        Route::any('toptrans', ['as' => 'adm.buy.toptrans.index', 'uses' => 'BuyToptransController@index']);
    });

    // Session Routes
    Route::get('login', ['as' => 'adm.login', 'uses' => 'SessionController@create']);
    Route::get('logout', ['as' => 'adm.logout', 'uses' => 'SessionController@destroy']);
    Route::resource('sessions', 'SessionController', ['only' => ['create', 'store', 'destroy']]);

    // User Routes
    Route::get('register', 'UserController@create');
    Route::get('users/{id}/activate/{code}', 'UserController@activate')->where('id', '[0-9]+');
    Route::get('resend', ['as' => 'resendActivationForm', function () {
        return View::make('adm.users.resend');
    }]);
    Route::post('resend', 'UserController@resend');
    Route::get('forgot', ['as' => 'forgotPasswordForm', function () {
        return View::make('adm.users.forgot');
    }]);
    Route::post('forgot', 'UserController@forgot');
    Route::post('users/{id}/change', 'UserController@change');

    Route::get('users/{id}/reset/{code}', 'UserController@reset')->where('id', '[0-9]+');
    Route::get('users/{id}/suspend', ['as' => 'suspendUserForm', function ($id) {
        return View::make('adm.users.suspend')->with('id', $id);
    }]);
    Route::post('users/{id}/suspend', 'UserController@suspend')->where('id', '[0-9]+');
    Route::get('users/{id}/unsuspend', 'UserController@unsuspend')->where('id', '[0-9]+');
    Route::get('users/{id}/ban', 'UserController@ban')->where('id', '[0-9]+');
    Route::get('users/{id}/unban', 'UserController@unban')->where('id', '[0-9]+');
    Route::resource('users', 'UserController');

    // Group Routes
    Route::resource('groups', 'GroupController');
});

Route::get('adm', ['as' => 'adm.home', function () {
    return View::make('adm.home');
}]);
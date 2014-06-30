<?php

Route::get('/', array('as' => 'home', 'uses' => 'HomeController@showWelcome'));

Route::get('feeds/{file?}', array('uses' => 'FeedController@show'));

Route::group(array('prefix' => 'feed/{file}'), function () {
    Route::get('feed', array('as' => 'feed.index', 'uses' => 'FeedServiceController@index'));
});

Route::group(array('prefix' => 'adm'), function () {

    Route::get('summary/tree2group', array('as' => 'adm.summary.tree2group.index', 'uses' => 'TreeGroupController@index'));
    Route::get('summary/treegrouptop', array('as' => 'adm.summary.treegrouptop.index', 'uses' => 'TreeGroupTopController@index'));

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

        Route::match(array('GET', 'POST'),'runner/{task}', array('as' => 'adm.admin.runner.task', 'uses' => 'CommandRunnerController@task'));
        Route::resource('runner', 'CommandRunnerController');
    });

    Route::group(array('prefix' => 'pattern', 'before' => 'Sentry|inGroup:Power'), function () {
        Route::resource('dev', 'DevController');
        Route::resource('mixturedev', 'MixtureDevController');
        Route::resource('mixturedevm2ndev', 'MixtureDevM2nDevController');
        Route::resource('tree', 'TreeController');
        Route::resource('mixturetree', 'MixtureTreeController');
        Route::resource('prod', 'ProdController');
    });

    Route::group(array('prefix' => 'sync', 'before' => 'Sentry|inGroup:Power'), function () {
        Route::resource('template', 'SyncCsvTemplateController');
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
<?php

Route::get('/', function () {
    return 'Hello World';
});

// Nastavení routy

Route::group(array('prefix' => 'adm'), function () {

    Route::get('nastaveni/tree-group-top', array('as' => 'adm.nastaveni.tree2group2top', 'uses' => 'Tree2group2topController@show'));

    Route::group(array('prefix' => 'ppc', 'before' => 'Sentry|inGroup:Admins'), function () {

        Route::any('import', array('as' => 'adm.ppc.import.show', 'uses' => 'PpcImportController@show'));
        Route::any('config', array('as' => 'adm.ppc.config.show', 'uses' => 'PpcConfigController@show'));

        Route::resource('rules', 'PpcRulesController');
        Route::resource('keywords', 'PpcKeywordsController');
    });

    Route::group(array('prefix' => 'admin', 'before' => 'Sentry|inGroup:Admins'), function () {

        Route::get('phpinfo', array('as' => 'adm.admin.phpinfo', 'uses' => 'PhpinfoController@show'));
        Route::resource('runner', 'CommandRunnerController');
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
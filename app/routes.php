<?php

Route::get('/', function () {
    return 'Hello World';
});

// Nastavení routy

Route::group(array('prefix' => 'adm'), function() {
    Route::get('nastaveni/tree-group-top', array('as' => 'adm.nastaveni.tree2group2top', 'uses' => 'Tree2group2topController@show'));
    Route::get('admin/phpinfo', array('as' => 'adm.admin.phpinfo', 'uses' => 'PhpinfoController@show'));

    Route::group(array('prefix' => 'ppc'), function() {
        Route::any('manual-import', array('as' => 'adm.Ppc2manual2import@show', 'uses' => 'Ppc2manual2importController@show'));
        Route::any('config', array('as' => 'adm.Ppc2config@show', 'uses' => 'Ppc2configController@show'));
        Route::any('rules', array('as' => 'adm.Ppc2rules@show', 'uses' => 'Ppc2rulesController@show'));
        Route::any('rules/create', array('as' => 'adm.Ppc2rules@create', 'uses' => 'Ppc2rulesController@create'));
    });
});

// PPC

// Session Routes
Route::get('adm/login', array('as' => 'adm.login', 'uses' => 'SessionController@create'));
Route::get('adm/logout', array('as' => 'adm.logout', 'uses' => 'SessionController@destroy'));
Route::resource('adm/sessions', 'SessionController', array('only' => array('create', 'store', 'destroy')));

// User Routes
Route::get('adm/register', 'UserController@create');
Route::get('adm/users/{id}/activate/{code}', 'UserController@activate')->where('id', '[0-9]+');
Route::get('adm/resend', array('as' => 'resendActivationForm', function () {
    return View::make('adm.users.resend');
}));
Route::post('adm/resend', 'UserController@resend');
Route::get('adm/forgot', array('as' => 'forgotPasswordForm', function () {
    return View::make('adm.users.forgot');
}));
Route::post('adm/forgot', 'UserController@forgot');
Route::post('adm/users/{id}/change', 'UserController@change');
Route::get('adm/users/{id}/reset/{code}', 'UserController@reset')->where('id', '[0-9]+');
Route::get('adm/users/{id}/suspend', array('as' => 'suspendUserForm', function ($id) {
    return View::make('adm.users.suspend')->with('id', $id);
}));
Route::post('adm/users/{id}/suspend', 'UserController@suspend')->where('id', '[0-9]+');
Route::get('adm/users/{id}/unsuspend', 'UserController@unsuspend')->where('id', '[0-9]+');
Route::get('adm/users/{id}/ban', 'UserController@ban')->where('id', '[0-9]+');
Route::get('adm/users/{id}/unban', 'UserController@unban')->where('id', '[0-9]+');
Route::resource('adm/users', 'UserController');

// Group Routes
Route::resource('adm/groups', 'GroupController');

Route::get('adm', array('as' => 'adm.home', function () {
    return View::make('adm.home');
}));
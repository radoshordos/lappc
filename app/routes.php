<?php
/*
Route::get('getdata', function () {
    $term = Input::get('term');
    $data = \Authority\Eloquent\ViewProd::where('prod_name', 'LIKE', "%$term%")->limit(10)->get();
    $result = [];
    foreach ($data as $key => $row) {
            $result[] = ['id' => $row->id, 'value' => $row->prod_name];
    }
    return Response::json($result);
});
*/

Route::get('getdata', ['uses' => 'SearchDataController@ajax']);
Route::get('getstoreroom', ['uses' => 'SearchDataController@storeroom']);

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
        Route::get('feed', ['as' => 'adm.admin.feed.index', 'uses' => 'FeedServiceController@index']);
        Route::get('phpinfo', ['as' => 'adm.admin.phpinfo.index', 'uses' => 'PhpinfoController@index']);
        Route::match(['GET', 'POST'], 'runner/{task}', ['as' => 'adm.admin.runner.task', 'uses' => 'CommandRunnerController@task']);
        Route::resource('runner', 'CommandRunnerController');
    });

    Route::group(['prefix' => 'product', 'before' => 'Sentry|inGroup:Simple'], function () {
        Route::resource('prod', 'ProdController');
        Route::match(['GET', 'POST'], 'prod/{tree}/{prod}/edit', ['as' => 'adm.product.prod.edit', 'uses' => 'ProdController@edit'])->where(['tree' => '[0-9]+', 'prod' => '[0-9]+']);
        Route::any('prod/{tree}/{prod}', ['as' => 'adm.product.prod.update', 'uses' => 'ProdController@update'])->where(['tree' => '[0-9]+', 'prod' => '[0-9]+']);
        Route::resource('akce', 'AkceController', ['only' => ['index']]);
        Route::resource('akcehuge', 'AkceHugeController', ['only' => ['index', 'store']]);
        Route::resource('akcetemplate', 'AkceTemplateController', ['only' => ['index','create','store']]);
        Route::resource('akceminitext', 'AkceMinitextController', ['only' => ['index','create','store']]);
        Route::resource('akceavailability', 'AkceAvailabilityController', ['only' => ['index','create','store']]);
    });

    Route::group(['prefix' => 'pattern', 'before' => 'Sentry|inGroup:Power'], function () {
        Route::resource('dev', 'DevController');
        Route::resource('tree', 'TreeController');
        Route::resource('mixturedev', 'MixtureDevController');
        Route::resource('mixturedevm2ndev', 'MixtureDevM2nDevController', ['only' => ['store','destroy']]);
        Route::resource('mixturetree', 'MixtureTreeController');
        Route::resource('mixturetreem2ntree', 'MixtureTreeM2nTreeController', ['only' => ['store','destroy']]);
        Route::resource('mixtureprod', 'MixtureProdController');
        Route::resource('mixtureprodm2nprod', 'MixtureProdM2nProdController', ['only' => ['store','destroy']]);
        Route::resource('mixtureitem', 'MixtureItemController');
        Route::resource('mixtureitemm2nitem', 'MixtureItemM2nItemController', ['only' => ['store','destroy']]);
        Route::resource('prodwarranty', 'ProdWarrantyController', ['only' => ['index','create', 'store']]);
        Route::resource('proddifference', 'ProdDifferenceController', ['only' => ['index','store']]);
        Route::resource('prodvariation', 'ProdVariationController', ['only' => ['index','create', 'store']]);
        Route::get('multiplechanges', ['as' => 'adm.pattern.multiplechanges.index', 'uses' => 'ProdMultipleChangesController@index']);
        Route::resource('multimedia', 'MultimediaController');
    });

    Route::group(['prefix' => 'summary', 'before' => 'Sentry|inGroup:Simple'], function () {
        Route::get('treegroup', ['as' => 'adm.summary.treegroup.index', 'uses' => 'TreeGroupController@index']);
        Route::get('treedev', ['as' => 'adm.summary.treedev.index', 'uses' => 'TreeDevController@index']);
        Route::match(['GET', 'POST'], 'sale', ['as' => 'adm.summary.sale.index', 'uses' => 'SummarySaleController@index']);
        Route::match(['GET', 'POST'], 'availability', ['as' => 'adm.summary.availability.index', 'uses' => 'SummaryAvailabilityController@index']);
        Route::get('treevisualization', ['as' => 'adm.summary.treevisualization.index', 'uses' => 'TreeVisualizationController@index']);
    });

    Route::group(['prefix' => 'sync', 'before' => 'Sentry|inGroup:Power'], function () {
        Route::resource('template', 'SyncCsvTemplateController');
        Route::resource('templatem2ncolumn', 'SyncTemplateM2nColumnController');
        Route::resource('manualimport', 'SyncManualImportController');
        Route::any('csvimport', ['as' => 'adm.sync.csvimport.index', 'uses' => 'SyncCsvImportController@index']);
        Route::any('record', ['as' => 'adm.sync.record.index', 'uses' => 'RecordSyncImportController@index']);
        Route::any('db', ['as' => 'adm.sync.db.index', 'uses' => 'SyncDbController@index']);
        Route::get('summary', ['as' => 'adm.sync.summary.index', 'uses' => 'SyncSummaryController@index']);
    });

    Route::group(['prefix' => 'tools', 'before' => 'Sentry|inGroup:Simple'], function () {
        Route::any('calculator', ['as' => 'adm.tools.calculator.index', 'uses' => 'ToolCalculatorController@index']);
        Route::any('comparator', ['as' => 'adm.tools.comparator.index', 'uses' => 'ToolComparatorController@index']);
        Route::any('csvoptimal', ['as' => 'adm.tools.csvoptimal.index', 'uses' => 'ToolCsvOptimalController@index']);
        Route::resource('grab', 'GrabController', ['only' => ['index','store']]);
        Route::any('grabsimulator', ['as' => 'adm.tools.grabsimulator.index', 'uses' => 'GrabSimulatorController@index']);
    });

    Route::group(['prefix' => 'stats', 'before' => 'Sentry|inGroup:Simple'], function () {
        Route::get('recordvisitors', ['as' => 'adm.stats.recordvisitors.index', 'uses' => 'RecordVisitorsLookingController@index']);
        Route::get('prodgraph', ['as' => 'adm.stats.prodgraph.index', 'uses' => 'StatsProdGraphController@index']);
        Route::get('marketsell', ['as' => 'adm.stats.marketsell.index', 'uses' => 'RecordMarketSellController@index']);
    });

    Route::group(['prefix' => 'buy', 'before' => 'Sentry|inGroup:Simple'], function () {
        Route::resource('maillist', 'MailListController', ['only' => ['index']]);
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


Route::resource('vyhledat-zbozi', 'VyhledatZboziController');
Route::resource('nakupni-kosik', 'NakupniKosikController');

Route::get('feeds/{file?}', ['uses' => 'FeedController@show']);
Route::match(['GET', 'POST'], '/', ['as' => 'web.home', 'uses' => 'HomeController@show']);
Route::match(['GET', 'POST'], '/{url01}', ['as' => 'web.url01', 'uses' => 'Url01Controller@show']);
Route::match(['GET', 'POST'], '/{url01}/{url02}', ['as' => 'web.url02', 'uses' => 'Url02Controller@show']);
Route::match(['GET', 'POST'], '/{url01}/{url02}/{url03}', ['as' => 'web.url03', 'uses' => 'Url03Controller@show']);
Route::match(['GET', 'POST'], '/{url01}/{url02}/{url03}/{url04}', ['as' => 'web.url04', 'uses' => 'Url04Controller@show']);

App::missing(function($exception)
{
    return Response::view('errors.missing', array('url' => Request::url()), 404);
});
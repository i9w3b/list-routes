<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
 */

if (config('listroutes.routes_show') != false && config('listroutes.routes_show') == true) {
    Route::name(config('listroutes.route_name'))->group(function () {
        Route::prefix(config('listroutes.prefix'))->group(function () {

            Route::get('routes', 'ListRoutesController@index')->name('index');

        });
    });
}


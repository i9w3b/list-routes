<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::name(config('listroutes.route_name'))->group(function () {
  Route::prefix(config('listroutes.prefix'))->group(function() {

    Route::get('routes', 'ListRoutesController@index')->name('index');

  });
});

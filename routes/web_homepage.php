<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// 메인 접속
Route::get('/', function () {
    return view("/homepage/coin", ['room_id' => 'btc']);
});


// view
Route::get('/homepage/view/{action}/coin_info', 'HomepageViewController@controllerAction');

// ajax
Route::post('/homepage/ajax/{action}', 'HomepageAjaxController@controllerAction');


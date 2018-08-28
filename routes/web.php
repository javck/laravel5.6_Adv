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

Route::get('/', function () {
    return view('welcome');
});

//後台Dashboard
Route::get('/backend','SiteController@renderDashboard');

//前台網店頁
Route::get('/shop','SiteController@renderShop');

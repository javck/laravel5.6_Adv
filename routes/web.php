<?php
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Illuminate\Http\Request;
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
Route::get('/backend', 'SiteController@renderDashboard')->middleware('auth');

//前台網店頁

Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']], function () {
    Route::get('/', 'SiteController@renderHomePage');
    Route::get('/shop', 'SiteController@renderShop');
    // Route::get('/thank',function(){
    //     return view('pages.thankyou');
    // });
    Route::get('/404-page', function () {
        return view('404-page');
    });
});

Auth::routes();
Route::get('login/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('login/{provider}/callback', 'Auth\LoginController@handleProviderCallback');

//Route::get('/home', 'HomeController@index')->name('home');

//針對語系切換的設計方式
Route::get('/lang/{lang}', function ($lang) {
    App::setLocale($lang);
    return redirect('/');
});

//針對路由加入單一中介層
Route::get('/home', 'HomeController@index')->name('home')->middleware('test');

//針對路由加入多個中介層
//Route::get('/home', 'HomeController@index')->name('home')->middleware('test', 'test2');

//針對路由加入帶參數中介層
//Route::get('/home', 'HomeController@index')->name('home')->middleware('args:javck');

//針對路由加入帶多個參數中介層
//Route::get('/home', 'HomeController@index')->name('home')->middleware('args:hello,javck,zack');


//本地化示範
Route::get('welcome', function () {
    return __('messages.welcome', ['name' => 'Zack']);
});

//本地化複數形示範
Route::get('buys', function () {
    return trans_choice('messages.buys', 8, ['item' => 'PS4']);
});


//後台

Route::group(['prefix' => 'backend'], function () {

    Route::resource('user', 'UserController');
    Route::resource('item', 'ItemController');
    Route::resource('cgy', 'CgyController');
    Route::resource('order', 'OrderController');
});


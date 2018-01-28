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
Route::get('/', [
    'as' => 'main',
    'uses' => 'MainController@index'
]);
/*Route::get('/logout', [
    'as' => 'logout',
    'uses' => 'LogoutController@index'
]);*/

Route::get('/catalog/{id?}', [
    'as' => 'catalog',
    'uses' => 'CatalogController@showCategory'
]);

Route::get('/advert/{id}', [
    'as' => 'advert',
    'uses' => 'AdvertsController@showAdverts'
]);

Route::get('/about', function() {
    return view('about');
})->name('about');

Route::get('/create-ad', [
    'as' => 'create.ad',
    'middleware' => 'auth',
    'uses' => 'CatalogController@createAdverts'
]);

Route::post('/create-ad', [
    'as' => 'create.ad',
    'middleware' => 'auth',
    'uses' => 'CatalogController@addAdverts'
]);
Route::get('logout', 'Auth\LoginController@logout');

Route::group(['middleware' => ['auth','admin'], 'as' => 'admin::', 'prefix' => 'admin', 'namespace' => 'Admin'], function () {
    Route::get('/', [
        'as' => 'admin.main',
        'uses' => function() {
         return view('admin/mainAdmin');
        }
    ]);
    // /admin/user/
    // /admin/user/1/edit
    // /admin/user/1/update
    // /admin/user/1/delete
    // php artisan route:list
    Route::resource('user', 'UserController', [
        'only' => ['index', 'create', 'store', 'edit', 'update', 'destroy']
    ]);
    Route::resource('category', 'CategoryController', [
        'only' => ['index', 'create', 'store', 'edit', 'update', 'destroy']
    ]);
    Route::resource('adverts', 'AdvertController', [
        'only' => ['index', 'create', 'store', 'edit', 'update', 'destroy']
    ]);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

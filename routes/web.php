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

Route::get('/', 'User\HomeController@index');
Route::get('/category/{id}', 'User\HomeController@showCategory')->name('home.showcategory');
Route::get('/document/{id}', 'User\HomeController@showDocument')->name('home.showdocument');

Auth::routes();

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout');

Route::group(['middleware' => ['auth']], function() {

    Route::get('/home', 'Admin\HomeController@index')->name('home');

    Route::get('users.profile', 'Admin\UserController@profile')->name('profile');

    Route::resource('users', 'Admin\UserController', ['only' => ['create', 'store'], 'middleware' =>
        'permission:user-create']);
    Route::resource('users', 'Admin\UserController', ['only' => ['edit', 'update'], 'middleware' =>
        'permission:user-update']);
    Route::resource('users', 'Admin\UserController', ['only' => ['show'], 'middleware' =>
        'permission:user-show']);
    Route::resource('users', 'Admin\UserController', ['only' => ['destroy'], 'middleware' =>
        'permission:user-delete']);
    Route::resource('users', 'Admin\UserController', ['only' => ['index'], 'middleware' =>
        'permission:user-list']);

    Route::resource('roles', 'Admin\RoleController', ['middleware' =>
		'permission:role-list']);

    Route::resource('permissions', 'Admin\PermissionController', ['middleware' =>
        'permission:permission-manage']);

	Route::resource('roles', 'Admin\RoleController', ['only' => ['index', 'show'], 'middleware' => 
		'permission:role-list']);

	Route::resource('roles', 'Admin\RoleController',['except' => ['index', 'show'], 'middleware' => 
		'permission:role-manage']);

	Route::get('servers/information/{id}', 'ServerController@getData')->name('servers.information');

    Route::resource('servers', 'ServerController');

    Route::resource('information', 'InformationController', ['only' => ['destroy', 'show']]);

    Route::resource('setups', 'SetupController', ['except' => ['store', 'create']]);
});


Route::resource('categories', 'Admin\categoryController');

//Route::get('documents', 'documentController');
Route::resource('documents', 'Admin\documentController');
Route::resource('contacts', 'Admin\contactController');

Route::get('/download/{id}', 'Admin\documentController@getDownload')->name('document.download');
Route::get('/download-document/{id}', 'User\HomeController@downloadDocument')->name('user.download');
Route::get('/demo/{id}', 'documentController@getDemo')->name('document.demo');


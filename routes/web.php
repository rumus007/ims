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

Route::get('/', 'Auth\LoginController@loginForm');

Auth::routes();


Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
Route::get('/home','DashboardController@index');

Route::group(['middleware' => ['permission:view_users,true']], function() {
    Route::get('/users', 'UserController@index')->name('users.index');
    Route::get('/users/create', 'UserController@create')->name('users.create');
    Route::post('/users/store', 'UserController@store')->name('users.store');
    Route::get('/users/edit/{id}', 'UserController@edit')->name('users.edit');
    Route::post('/users/update/{id}', 'UserController@update')->name('users.update');
    Route::any('/users/delete/{id}', 'UserController@destroy')->name('users.destroy');
});

Route::group(['middleware' => ['permission:view_roles,true']], function (){
    Route::get('/roles', 'RoleController@index')->name('roles.index');
    Route::get('/roles/create', 'RoleController@create')->name('roles.create');
    Route::post('/roles/store', 'RoleController@store')->name('roles.store');
    Route::get('/roles/edit/{id}', 'RoleController@edit')->name('roles.edit');
    Route::post('/roles/update/{id}', 'RoleController@update')->name('roles.update');
    Route::any('/roles/delete/{id}', 'RoleController@destroy')->name('roles.destroy');
});


Route::group([
    'prefix' => '/admin/menus',
    'middleware' => ['permission:view_categories,true']
    ], function()
{
    // Showing the admin for the menu builder and updating the order of menu items
    Route::get('/', 'MenuController@Index')->name('menu.index');
    Route::get('/create','MenuController@create')->name('menu.create');
    Route::post('order', 'MenuController@postIndex');
    Route::post('new', 'MenuController@postNew')->name('menu.store');
    Route::get('edit/{id}', 'MenuController@Edit')->name('menu.edit');
    Route::post('edit/{id}', 'MenuController@menuEdit')->name('menu.update');
    Route::post('delete', 'MenuController@menuDelete');
});




